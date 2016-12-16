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
	
	//スケジュールIDの取得
	$schedule_id = $_SESSION["schedule_id"];
	
	//メンバーIDの取得
	$login_id = $_SESSION["login_id"];
	
	//選択済み座席情報の取得
	$seat_position_list = $_SESSION["seat_position_list"];
	$smarty->assign("seat_position_list", $seat_position_list);
	
	$seat_detail = $_SESSION["seat_detail"];

	
	$ticket_price_list = $_SESSION["ticket_price_list"];
	$smarty->assign("ticket_price_list", $ticket_price_list);

	/***************
	 * チケット券種の処理
	 **************/
	
	$ticket_select_list = array();
	$t_selection_number = 0;
	
	//tplからチケット券種をもらう
	if (!empty($_POST["general"])){
		$general = $_POST["general"];
		$ticket_select_list = ["general" => $general];
		
		$t_selection_number = $t_selection_number + $general;
	} if (!empty($_POST["college"])){
		$college = $_POST["college"];
		$ticket_select_list = ["college" => $college];
		$t_selection_number = $t_selection_number + $college;

	} if (!empty($_POST["child"])){
		$child = $_POST["child"];
		$ticket_select_list = ["child" => $child];
	
		$t_selection_number = $t_selection_number + $child;
	} if (!empty($_POST["highschool"])){
		$highschool = $_POST["highschool"];
		$ticket_select_list = ["highschool" => $highschool];
		
		$t_selection_number = $t_selection_number + $highschool;
	} if (!empty($_POST["junior"])){
		$junior = $_POST["junior"];
		$ticket_select_list = ["junior" => $junior];

		$t_selection_number = $t_selection_number + $junior;
	} if (!empty($_POST["senior"])){
		$senior = $_POST["senior"];
		$ticket_select_list = ["senior" => $senior];

		$t_selection_number = $t_selection_number + $senior;
	} if (!empty($_POST["women"])){
		$women = $_POST["women"];
		$ticket_select_list = ["women" => $women];
	
		$t_selection_number = $t_selection_number + $women;
	}
	
	//選択した座席数と、券種の枚数が一致しているか。
	if($t_selection_number !== count($seat_position_list)) {
		//一致しない場合。
		$validationMsgs[] = "合計".count($seat_position_list)."枚選択してください。";
		$validationMsgs[] = "選択している座席と券種の枚数が一致していません。";
	} else {
		//一致した場合。
		print "一致";
	}
		
	
	if (empty($validationMsgs)) {
		try {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$seatDAO = new SeatDAO($db);
			$priceDAO = new PriceDAO($db);
			$memberDAO = new MemberDAO($db);
			
			//メンバー情報取得
			$member = $memberDAO->findByLoginid($login_id);
			$smarty->assign("member", $member);
			
		} catch (PDOException $ex) {
			print_r($ex);
			$smarty->assign("errorMsg", "接続障害が発生しました。再度お試しください。");
			$tplPath = "error.tpl";
		} finally {
			$db = null;
		}
	}
	
	if(!empty($validationMsgs)) {
		$tplPath = "rev/revTicketSelect.tpl";
		$smarty->assign("validationMsgs" , $validationMsgs);		
	}
	
	//映画情報取得
	$smarty->assign("seat_detail", $seat_detail);
	$smarty->display($tplPath);
}