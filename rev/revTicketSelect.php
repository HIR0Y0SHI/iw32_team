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
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Functions.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Price.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/PriceDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SpecialDay.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SpecialDayDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SeatDetail.class.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Member.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/MemberDAO.class.php');


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


	/***************
	 * チケット券種の処理
	 **************/
	
	$ticket_select_list = array();
	$t_selection_number = 0;
	$total_price = 0;
	
	//tplからチケット券種をもらう
	if (!empty($_POST["general"])){
		$general = $_POST["general"];
		$ticket_select_list = ["general" => "一般：1,800円 × ".$general."枚"];
		
		$t_selection_number = $t_selection_number + $general;
		$total_price = $total_price + (1800 * $general);
	} if (!empty($_POST["college"])){
		$college = $_POST["college"];
		$ticket_select_list = ["college" => "大学生：1,500円 × ".$college."枚"];
		$t_selection_number = $t_selection_number + $college;
		
		$total_price = $total_price + (1500 * $college);
	} if (!empty($_POST["child"])){
		$child = $_POST["child"];
		$ticket_select_list = ["child" => "幼児：1,000円 × ".$child."枚"];
	
		$t_selection_number = $t_selection_number + $child;
		$total_price = $total_price + (1000 * $child);
	} if (!empty($_POST["highschool"])){
		$highschool = $_POST["highschool"];
		$ticket_select_list = ["highschool" =>  "高校生：1,000円 × ".$highschool."枚"];
		
		$t_selection_number = $t_selection_number + $highschool;
		$total_price = $total_price + (1000 * $highschool);
	} if (!empty($_POST["junior"])){
		$junior = $_POST["junior"];
		$ticket_select_list = ["junior" => "中・小学生：1,000円 × ".$junior."枚"];

		$t_selection_number = $t_selection_number + $junior;
		$total_price = $total_price + (1000 * $junior);
	} if (!empty($_POST["senior"])){
		$senior = $_POST["senior"];
		$ticket_select_list = ["senior" => "シニア：1,000円 × ".$senior."枚"];

		$t_selection_number = $t_selection_number + $senior;
		$total_price = $total_price + (1000 * $senior);
	} if (!empty($_POST["women"])){
		$women = $_POST["women"];
		$ticket_select_list = ["women" => "レディースデー：1,500円 × ".$women."枚"];
	
		$t_selection_number = $t_selection_number + $women;
		$total_price = $total_price + (1500 * $women);
	}
	
	//選択した座席数と、券種の枚数が一致しているか。
	if($t_selection_number !== count($seat_position_list)) {
		//一致しない場合。
		$validationMsgs[] = "選択している座席と券種の枚数が一致していません。";
		$validationMsgs[] = "合計".count($seat_position_list)."枚選択してください。";
	} else {
		//一致した場合。
		//print "一致";
	}
		
	
	if (empty($validationMsgs)) {
		try {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$memberDAO = new MemberDAO($db);
			$seatDAO = new SeatDAO($db);
			
			//映画情報取得
			$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
			$smarty->assign("seat_detail", $seat_detail);
			
			//メンバー情報取得
			$member = $memberDAO->findByLoginid($login_id);
			$smarty->assign("member", $member);
			
			//予約座席情報
			$smarty->assign("ticket_select_list",$ticket_select_list);

			//チケット価格
			$smarty->assign("total_price" , $total_price);			
			
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
		
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$seatDAO = new SeatDAO($db);
		$priceDAO = new PriceDAO($db);
		$specialdayDAO = new SpecialDayDAO($db);


		//映画情報取得
		$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
		$smarty->assign("seat_detail", $seat_detail);

		/* ****************
		 * 特別日の判定
		 * ************** */


		//チケット券種取得
		//特別日 = true ,　特別日以外 false 
		if(empty($_SESSION["ladiesdayflg"])){
			$ticket_price_list = $priceDAO->findAllNotSpecialDay();
		} else {
			$ticket_price_list = $priceDAO->findAll();
		}

		$_SESSION["ticket_price_list"] = $ticket_price_list;
		$smarty->assign("ticket_price_list", $ticket_price_list);
	}
	
	//チケット価格取得
	$ticket_price_list = $_SESSION["ticket_price_list"];
	$smarty->assign("ticket_price_list", $ticket_price_list);
	
	//映画情報取得
	$smarty->assign("seat_detail", $seat_detail);
	$smarty->display($tplPath);
}
