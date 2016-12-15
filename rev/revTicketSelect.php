<?php
/**
 * 座席・予約処理。
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/13
 */
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SeatDetail.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Price.class.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/MemberDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/PriceDAO.class.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Functions.php');

@session_start();

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . "/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'] . "/IW32_Team_Project/templates_c");

/* ログインチェック */
if (loginCheck()) {
	$validationMsgs[] = "ログインしていないか、前回ログインしてから一定時間が経過しています。もう一度ログインし直してください。";
	$smarty->assign("validationMsgs", $validationMsgs);
	$tplPath = "login.tpl";
	$smarty->display($tplPath);
} else {
	
	$isRedirect = false;
	$tplPath = "rev/revInput.tpl";
	
	//tplからチケット券種をもらう
	if (!empty($_POST["general"])){
		print $_POST["general"];
	} if (!empty($_POST["college"])){
		print $_POST["college"];
	} if (!empty($_POST["child"])){
		print $_POST["child"];
	} if (!empty($_POST["highschool"])){
		print $_POST["highschool"];
	} if (!empty($_POST["junior"])){
		print $_POST["junior"];
	} if (!empty($_POST["senior"])){
		print $_POST["senior"];
	} if (!empty($_POST["women"])){
		print $_POST["women"];
	}
	
	

	//スケジュールIDの取得
	$schedule_id = $_SESSION["schedule_id"];
	
	//メンバーIDの取得
	$login_id = $_SESSION["login_id"];
	
	//座席情報
	$seat_position_list = $_SESSION["seat_position_list"];
	$smarty->assign("seat_position_list", $seat_position_list);
	
	if (empty($validationMsgs)) {
		try {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$seatDAO = new SeatDAO($db);
			$priceDAO = new PriceDAO($db);
			$memberDAO = new MemberDAO($db);
			
			//チケット情報取得
			$ticket_price_list = $priceDAO->findAll();

			//メンバー情報取得
			$member = $memberDAO->findByLoginid($login_id);
			$smarty->assign("member", $member);

			//映画情報取得
			$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
			$smarty->assign("seat_detail", $seat_detail);
			


		} catch (PDOException $ex) {
			print_r($ex);
			$smarty->assign("errorMsg", "接続障害が発生しました。再度お試しください。");
			$tplPath = "error.tpl";
		} finally {
			$db = null;
		}
	}

	$smarty->display($tplPath);
}