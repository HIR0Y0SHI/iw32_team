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
	 * 映画IDから、座席スクリーン検索。
	 * 
	 * @return array 全特別日情報が格納された連想配列。キーは特別日ID、値はSpecialDayエンティティオブジェクト。
	 */
	public function findAll() {
		$sql = "SELECT * FROM m_special_day ORDER BY special_day_id";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$specialdayList = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$special_day_id = $row["special_day_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$movie_category_id = $row["movie_category_id"];
			$name = $row["name"];
			$monday = $row["monday"];
			$tuesday = $row["tuesday"];
			$wednesday = $row["wednesday"];		
			$thursday = $row["thursday"];
			$friday = $row["friday"];		
			$saturday = $row["saturday"];
			$sunday = $row["sunday"];		
			
			$specialday = new Emp();
			$specialday->setSpecialDayId($special_day_id);
			$specialday->setCustomerPartitionId($customer_partition_id);
			$specialday->setMovieCategoryId($movie_category_id);
			$specialday->setName($name);
			$specialday->setMonday($monday);
			$specialday->setTuesday($tuesday);
			$specialday->setWednesday($wednesday);
			$specialday->setThursday($thursday);
			$specialday->setFriday($friday);
			$specialday->setSaturday($saturday);
			$specialday->setSunday($sunday);
			$specialdayList[$special_day_id] = $specialday;
		}
		return $specialdayList;
	}
	
}