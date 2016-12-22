<?php
/**
 * くれじっとかーどだお
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */

/**
 * memberデーブルへのデータ操作クラス。
 */
class CreditCardDAO {
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
	 * メンバーIDによる検索。
	 * 
	 * @param Int $member_id 会員番号。
	 * @return User 該当するMemberオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findByCreditCardNo($member_id) {
		$sql = "SELECT * FROM m_creditcard WHERE member_id = :member_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":member_id", $member_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$ccno = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$member_id = $row["member_id"];
			$card_no = $row["card_no"];			
			
			$ccno = new CreditCard();
			$ccno->setMemberId($member_id);
			$ccno->setCardNo($card_no);
		}
		return $ccno;
	}
}
?>
	