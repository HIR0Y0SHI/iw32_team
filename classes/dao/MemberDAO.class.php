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
class MemberDAO {
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
	 * ログインIDによる検索。
	 * 
	 * @param string $login_id 会員番号。
	 * @return User 該当するMemberオブジェクト。ただし、該当データがない場合はnull。
	 */
	public function findByLoginid($login_id) {
		$sql = "SELECT * FROM m_member WHERE login_id = :login_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":login_id", $login_id, PDO::PARAM_INT);
		$result = $stmt->execute();
		$member = null;
		if($result && $row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$member_id = $row["member_id"];
			$login_id = $row["login_id"];
			$password = $row["password"];
			$last_name = $row["last_name"];
			$first_name = $row["first_name"];
			$last_name_kana = $row["last_name_kana"];
			$first_name_kana = $row["first_name_kana"];
			$sex = $row["sex"];
			$postal_code = $row["postal_code"];
			$prefectures = $row["prefectures"];
			$city = $row["city"];
			$address = $row["address"];
			$apartment = $row["apartment"];
			$tel = $row["tel"];
			$mail = $row["mail"];
			$birthday = $row["birthday"];
			$entry_date = $row["entry_date"];
			$withdrawal_day = $row["withdrawal_day"];
			
			
			$member = new Member();
			$member->setMemberId($member_id);
			$member->setLoginId($login_id);
			$member->setPassword($password);
			$member->setLastName($last_name);
			$member->setFirstName($first_name);
			$member->setFirstNameKana($last_name_kana);
			$member->setLastNameKana($first_name_kana);
			$member->setSex($sex);
			$member->setPostalCode($postal_code);
			$member->setPrefectures($prefectures);
			$member->setCity($city);
			$member->setAddress($address);
			$member->setApartment($apartment);
			$member->setTel($tel);
			$member->setMail($mail);
			$member->setBirthday($birthday);
			$member->setEntryDate($entry_date);
			$member->setWithdrawalDay($withdrawal_day);
		}
		return $member;
	}
}
?>
	