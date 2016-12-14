<?php
/**
 * とりあえずテスト用。ログインチェック用ページ。
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/14
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/Member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/dao/MemberDAO.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates_c");	

$isRedirect = false;
$tplPath = "login.tpl";

$login_id = $_POST["login_id"];
$login_ps = $_POST["login_ps"];

$login_id = trim($login_id);
$login_ps = trim($login_ps);

$validationMsgs = array();

if(strlen($login_id) == 0) {
	$validationMsgs[] = "IDを入力してください。";
}
if(strlen($login_ps) == 0){
	$validationMsgs[] = "パスワードを入力してください。";
}

if(empty($validationMsgs)) {
	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$memberDAO = new MemberDAO($db);
		
		$member = $memberDAO->findByLoginid($login_id);
		if($member == null) {
			$validationMsgs[] = "存在しないアカウントです。正しいIDを入力して下さい。";
		}
		else {
			$member_ps = $member->getPassword();
			if($login_ps == $member_ps) {
				$member_id = $member->getMemberId();
				$last_name = $member->getLastName();
				$first_name = $member->getFirstName();
				$last_name_kana = $member->getLastNameKana();
				$first_name_kana = $member->getFirstNameKana();
				$sex = $member->getSex();
				$postal_code = $member->getPostalCode();
				$prefectures = $member->getPrefectures();
				$city = $member->getCity();
				$address = $member->getAddress();
				$apartment = $member->getApartment();
				$tel = $member->getTel();
				$mail = $member->getMail();
				$birthday = $member->getBirthday();
				$entry_date = $member->getEntryDate();
				$withdrawal_day = $member->getWithdrawalDay();
				
				$_SESSION["loginFlg"] = true;
				$_SESSION["member_id"] = $member_id;
				$_SESSION["last_name"] = $last_name;
				$_SESSION["first_name"] = $first_name;
				$_SESSION["last_name_kana"] = $last_name_kana;
				$_SESSION["first_name_kana"] = $first_name_kana;
				$_SESSION["sex"] = $sex;
				$_SESSION["postal_code"] = $postal_code;
				$_SESSION["prefectures"] = $prefectures;
				$_SESSION["city"] = $city;
				$_SESSION["address"] = $address;
				$_SESSION["apartment"] = $apartment;
				$_SESSION["tel"] = $tel;
				$_SESSION["mail"] = $mail;
				$_SESSION["birthday"] = $birthday;
				$_SESSION["entry_date"] = $entry_date;
				$_SESSION["withdrawal_day"] = $withdrawal_day;
				
				$isRedirect = true;
			}
			else {
				$validationMsgs[] = "パスワードが違います。正しいパスワードを入力して下さい。";
			}
		}
	}
	catch (PDOException $ex) {
		print_r($ex);
		$smarty->assign("errorMsg","DB接続に失敗しました。");
		$tplPath = "error.tpl";
	}
	finally {
		$db = null;
	}
}

if($isRedirect) {
	header("Location: /IW32_Team_Project/goTop.php");
	exit;
}
else {
	if(!empty($validationMsgs)) {
		$smarty->assign("validationMsgs",$validationMsgs);
		$smarty->assign("login_id",$login_id);		
	}
	$smarty->display($tplPath);
}
?>
