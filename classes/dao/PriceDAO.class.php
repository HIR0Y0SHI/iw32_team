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
		$sql = "SELECT * FROM m_price WHERE movie_category_id = 1 ORDER BY price DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$ticket_price_list = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$movie_category_id = $row["movie_category_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$name = $row["name"];
			$price = $row["price"];
			$supplementation = $row["supplementation"];
			
			$ticketprice = new Price();
			$ticketprice->setMovieCategoryId($movie_category_id);
			$ticketprice->setCustomerPartitionId($customer_partition_id);
			$ticketprice->setName($name);
			$ticketprice->setPrice($price);
			$ticketprice->setSupplementation($supplementation);
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
		$sql = "SELECT * FROM m_price WHERE movie_category_id = 1 AND NOT customer_partition_id = 'women' ORDER BY price DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$ticket_price_list = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$movie_category_id = $row["movie_category_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$name = $row["name"];
			$price = $row["price"];
			$supplementation = $row["supplementation"];
			
			$ticketprice = new Price();
			$ticketprice->setMovieCategoryId($movie_category_id);
			$ticketprice->setCustomerPartitionId($customer_partition_id);
			$ticketprice->setName($name);
			$ticketprice->setPrice($price);
			$ticketprice->setSupplementation($supplementation);
			$ticket_price_list[$customer_partition_id] = $ticketprice;
		}
		return $ticket_price_list;
	}
	
	/**
	 * レイトショー
	 * 
	 * @return array 全チケット価格が格納された連想配列。
	 */
	public function findLateshow() {
		$sql = "SELECT * FROM m_price WHERE movie_category_id = 5";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$ticket_price_list = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$movie_category_id = $row["movie_category_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$name = $row["name"];
			$price = $row["price"];
			$supplementation = $row["supplementation"];
			
			$ticketprice = new Price();
			$ticketprice->setMovieCategoryId($movie_category_id);
			$ticketprice->setCustomerPartitionId($customer_partition_id);
			$ticketprice->setName($name);
			$ticketprice->setPrice($price);			
			$ticketprice->setSupplementation($supplementation);
			$ticket_price_list[$customer_partition_id] = $ticketprice;
		}
		return $ticket_price_list;
	}
	
	/**
	 * スペシャルデーを除くレイトショー
	 * 
	 * @return array 全チケット価格が格納された連想配列。
	 */
	public function findLateshowNotSpecialDay() {
		$sql = "SELECT * FROM m_price WHERE movie_category_id = 5 AND NOT customer_partition_id = 'women' ORDER BY price DESC";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$ticket_price_list = array();	
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$movie_category_id = $row["movie_category_id"];
			$customer_partition_id = $row["customer_partition_id"];
			$name = $row["name"];
			$price = $row["price"];
			$supplementation = $row["supplementation"];
			
			$ticketprice = new Price();
			$ticketprice->setMovieCategoryId($movie_category_id);
			$ticketprice->setCustomerPartitionId($customer_partition_id);
			$ticketprice->setName($name);
			$ticketprice->setPrice($price);
			$ticketprice->setSupplementation($supplementation);
			$ticket_price_list[$customer_partition_id] = $ticketprice;
		}
		return $ticket_price_list;
	}
	
}
?>
	