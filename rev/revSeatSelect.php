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
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SpecialDay.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Price.class.php');


require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SpecialDayDAO.class.php');
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

	$tplPath = "rev/revTicketSelect.tpl";

	//スケジュールIDの取得
	$schedule_id = $_SESSION["schedule_id"];
	$_SESSION["schedule_id"] = $schedule_id;
		
	/************************************
	 * ムービーカテゴリの取得
	 *
	 *  特別料金設定するときにいるのでいまはいりまてん
	 */
	//$movie_category_id = $_SESSION["movie_category_id"];

	//バリデーション配列定義
	$validationMsgs = array();

	/*	 * ****************************** */
	/* 座席番号を持ってくる処理        */
	/* revSeatSelect.tplから値を取得  */
	$seat_position_list = array();
	$seat_position_list = json_decode($_POST["seat_position"], true);

	if ($seat_position_list == NULL) {
		//選択された座席がない場合		
		$validationMsgs[] = "座席を選択してください。";
	}

	$_SESSION["seat_position_list"] = $seat_position_list;
	$smarty->assign("seat_position_list", $seat_position_list);


	if (empty($validationMsgs)) {
		try {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$seatDAO = new SeatDAO($db);
			$priceDAO = new PriceDAO($db);
			$specialdayDAO = new SpecialDayDAO($db);


			//映画情報取得
			$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
			$_SESSION["seat_detail"] = $seat_detail;
			$smarty->assign("seat_detail", $seat_detail);

			/* ***************
			 * 特別日の判定
			 * ************** */
			$specialday = $specialdayDAO->findAll();
			$ladiesdayflg = false;

			//レディースデー
			$weeklist = array();
			$weeklist[] = $specialday->getSunday();
			$weeklist[] = $specialday->getMonday();
			$weeklist[] = $specialday->getTuesday();
			$weeklist[] = $specialday->getThursday();
			$weeklist[] = $specialday->getWednesday();
			$weeklist[] = $specialday->getFriday();
			$weeklist[] = $specialday->getSaturday();

			//中身の判定
			for ($i = 0; $i < count($weeklist); $i++) {
				//特別日の曜日を判定
				if (!empty($weeklist[$i])) {
					//スケジュールIDからの映画上映日と特別日を判定
					if ($i == $seat_detail->getWeek()) {
						$ladiesdayflg = true;
						$_SESSION["ladiesdayflg"] = $ladiesdayflg;
					}
				}
			}
			//レイトショーかの判定
			$movie_category = $seat_detail->getMovieCategoryId();
			
			//チケット券種取得
			//特別日 = true ,　特別日以外 false
			 
			//レイトショー
			if ($movie_category != 5) {
				if(empty($ladiesdayflg)){
					$ticket_price_list = $priceDAO->findAllNotSpecialDay();
				} else {
					$ticket_price_list = $priceDAO->findAll();
				}
			} else {//レイトショーじゃない
				if(empty($ladiesdayflg)){
					$ticket_price_list = $priceDAO->findLateshowNotSpecialDay();
				} else {
					$ticket_price_list = $priceDAO->findLateshow();
				}
			}
			
			
			
			$_SESSION["ticket_price_list"] = $ticket_price_list;
			$smarty->assign("ticket_price_list", $ticket_price_list);
		} catch (PDOException $ex) {
			print_r($ex);
			$smarty->assign("errorMsg", "接続障害が発生しました。再度お試しください。");
			$tplPath = "error.tpl";
		} finally {
			$db = null;
		}
	}
	
	if(!empty($validationMsgs)) {
		$smarty->assign("validationMsgs" , $validationMsgs);
		
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$seatDAO = new SeatDAO($db);

		
		$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
		$reserved_seat_list = $seatDAO->findByPK($schedule_id);

		$_SESSION["reserved_count"] = count($reserved_seat_list);

		$unavailable_seats = array_keys($reserved_seat_list);
		
		$smarty->assign("seat_detail",$seat_detail);
		$smarty->assign("reserved_seat_list",$reserved_seat_list);
		$smarty->assign("unavailable_seats", json_encode($unavailable_seats));
		$tplPath = "rev/revSeatSelect.tpl";
	}

	$smarty->display($tplPath);
}