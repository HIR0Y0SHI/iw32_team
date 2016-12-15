<?php
/**
 * 会員だお
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */

/**
 * memberデーブルへのデータ操作クラス。
 */
class PriceDAO {
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
	 * 全チケット価格検索。
	 * 
	 * @return array 全チケット価格が格納された連想配列。
	 */
	public function findAll() {
		$sql = "SELECT * FROM m_price ORDER BY price DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$ticket_price_list = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$movie_category_id = $row["movie_category_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$name = $row["name"];
			$price = $row["price"];
			
			$ticketprice = new Price();
			$ticketprice->setMovieCategoryId($movie_category_id);
			$ticketprice->setCustomerPartitionId($customer_partition_id);
			$ticketprice->setName($name);
			$ticketprice->setPrice($price);
			$ticket_price_list[$customer_partition_id] = $ticketprice;
		}
		return $ticket_price_list;
	}
	
	/**
	 * スペシャルデーを除くチケット価格検索。
	 * 
	 * @return array 全チケット価格が格納された連想配列。
	 */
	public function findAllNotSpecialDay() {
		$sql = "SELECT * FROM m_price WHERE NOT customer_partition_id = 'women' ORDER BY price DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$ticket_price_list = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$movie_category_id = $row["movie_category_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$name = $row["name"];
			$price = $row["price"];
			
			$ticketprice = new Price();
			$ticketprice->setMovieCategoryId($movie_category_id);
			$ticketprice->setCustomerPartitionId($customer_partition_id);
			$ticketprice->setName($name);
			$ticketprice->setPrice($price);
			$ticket_price_list[$customer_partition_id] = $ticketprice;
		}
		return $ticket_price_list;
	}
	
}
?>
	