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
class ReservationDAO {
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
	 * 予約情報登録。
	 * 
	 * @param Reservation $reservation 登録情報が格納されたSeatオブジェクト。
	 * @return boolean 登録が完了したかどうかを表す値。
	 */
	public function insertReservation(Reservation $reservation) {
		$sqlInsert = "INSERT INTO t_reservation (reservation_id, member_id, date, schedule_id)"
				. " VALUES (:reservation_id, :member_id, :date, :schedule_id)";
		$stmt = $this->db->prepare($sqlInsert);
		$stmt->bindValue(":reservation_id", $reservation->getReservationId(), PDO::PARAM_NULL);
		$stmt->bindValue(":member_id", $reservation->getMemberId(), PDO::PARAM_INT);
		$stmt->bindValue(":date", $reservation->getDate(), PDO::PARAM_STR);
		$stmt->bindValue(":schedule_id", $reservation->getScheduleId(), PDO::PARAM_INT);
		$result = $stmt->execute();
		
		return $result;
	}
	
	/**
	 * 一番最後に登録された予約情報を取得する。
	 * 
	 * @return Int $reservation_idの値。
	 */
	public function findByLatestReservationId() {
		$sql = "SELECT * FROM t_reservation ORDER BY reservation_id DESC LIMIT 1";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$reservation_id = $row["reservation_id"];			
		}
		return $reservation_id;
	}
	
}