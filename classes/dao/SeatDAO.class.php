<?php
/**
 * 座席だお
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/**
 * deptテーブルへのデータ操作クラス。
 */
class SeatDAO {
	/**
	 * @var PDO DB接続オブジェクト
	 */
	private $db;
	
	/**
	 * コンストラクタ
	 * 
	 * @param PDO $db DB接続オブジェクト
	 */
	public function __construct(PDO $db) {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->db = $db;
	}
	
	
	/**
	 * スケジュールIDから、映画情報・座席数・スクリーン・開始時間・年齢制限・映画名を取得。
	 * 
	 * @return array 該当するSeatDetailオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findFromMovieDetail($schedual_id) {
		$sql = "SELECT SD.schedual_id , SD.doors_open_time , SD.closing_time, SD.screen_id , SC.number_of_seats , M.movie_name , M.movie_category_id , AL.age FROM m_schedual SD INNER JOIN m_movie M ON SD.movie_id = M.movie_id INNER JOIN m_age_limit AL ON AL.age_limit_id = M.age_limit_id INNER JOIN m_screen SC ON SD.screen_id = SC.screen_id WHERE SD.schedual_id = :schedual_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":schedual_id", $schedual_id , PDO::PARAM_INT);
		$result = $stmt->execute();
		$seat_detail = null;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$schedual_id = $row["schedual_id"];
			$doors_open_time = $row["doors_open_time"];
			$closing_time = $row["closing_time"];
			$screen_id = $row["screen_id"];
			$number_of_seats = $row["number_of_seats"];
			$movie_name = $row["movie_name"];
			$movie_category_id = $row["movie_category_id"];		
			$age = $row["age"];
			
			/*日時処理*/
			$week_name = array("日", "月", "火", "水", "木", "金", "土");
			$weekly = date('w' , strtotime($doors_open_time));
					
			$screening_day = date('Y年n月j日' , strtotime($doors_open_time)) . "（$week_name[$weekly]）";
			$open_time = date('H:i' , strtotime($doors_open_time));
			$close_time = date('H:i' , strtotime($closing_time));

			/*セッションに格納*/
			$_SESSION["schedual_id"] = $schedual_id;
			$_SESSION["movie_category_id"] = $movie_category_id;
					
			$seat_detail = new SeatDetail();
			$seat_detail->setSchedualId($schedual_id);
			$seat_detail->setScreeningDay($screening_day);
			$seat_detail->setOpenTime($open_time);
			$seat_detail->setCloseTime($close_time);
			$seat_detail->setScreenId($screen_id);
			$seat_detail->setNumberOfSeats($number_of_seats);
			$seat_detail->setMovieName($movie_name);
			$seat_detail->setMovieCategoryId($movie_category_id);
			
			//上映曜日取得
			$seat_detail->setWeek($weekly);
			
			$seat_detail->setAge($age);
		}
		return $seat_detail;
	}
	
	/**
	 * 既に予約された座席の検索。
	 * 
	 * @return array 全予約情報が格納された連想配列。キーは座席、値は座席エンティティオブジェクト。
	 */
	public function findByPK($schedual_id) {
		$sql = "SELECT * FROM t_seat WHERE  schedual_id = :schedual_id ORDER BY seat_positon DESC";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":schedual_id" , $schedual_id , PDO::PARAM_INT);
		$result = $stmt->execute();
		$reserved_seat_list = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$schedual_id = $row["schedual_id"];
			$seat_positon = $row["seat_positon"];
			
			$reserved_seat = new Seat();
			$reserved_seat->setSeatPositon($seat_positon);
			$reserved_seat->setSchedualId($schedual_id);
			$reserved_seat_list[$seat_positon] = $reserved_seat;
		}
		return $reserved_seat_list;
	}

	
	/**
	 * 座席情報登録。
	 * 
	 * @param Seat $seat 登録情報が格納されたSeatオブジェクト。
	 * @return boolean 登録が完了したかどうかを表す値。
	 */
	public function insertSeat(Seat $seat) {
		$sqlInsert = "INSERT INTO t_seat (schedual_id, seat_positon, reservation_id, customer_partition_id, movie_category_id)"
				. " VALUES (:schedual_id, :seat_positon, :reservation_id, :customer_partition_id, :movie_category_id)";
		$stmt = $this->db->prepare($sqlInsert);
		$stmt->bindValue(":schedual_id", $seat->getSchedualId(), PDO::PARAM_INT);
		$stmt->bindValue(":seat_positon", $seat->getSeatPositon(), PDO::PARAM_STR);
		$stmt->bindValue(":reservation_id", $seat->getReservationId(), PDO::PARAM_INT);
		$stmt->bindValue(":customer_partition_id", $seat->getCustomerPartitionId(), PDO::PARAM_STR);
		$stmt->bindValue(":movie_category_id", $seat->getMovieCategoryId(), PDO::PARAM_INT);
		$result = $stmt->execute();
		return $result;
	}
	
}