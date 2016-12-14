<?php
/**
 * 座席・予約処理。
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/13
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/Reservation.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/SeatDetail.class.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/dao/ReservationDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Functions.php');

@session_start();

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates_c");

/*ログインチェック*/
if(loginCheck()) {
	$validationMsgs[] = "ログインしていないか、前回ログインしてから一定時間が経過しています。もう一度ログインし直してください。";
	$smarty->assign("validationMsgs",$validationMsgs);
	$tplPath = "login.tpl";
	$smarty->display($tplPath);
} else {
	
	$isRedirect = false;
	$tplPath = "rev/revTicketSelect.tpl";
	
	//メンバーID取得
	$member_id = $_SESSION['member_id'];
	//スケジュールIDの取得
	$schedule_id = $_SESSION["schedule_id"];
	//ムービーカテゴリの取得
	$movie_category_id = $_SESSION["movie_category_id"];
	
	//現在時刻取得
	$now = date("Y-m-d H:i:s");
	
	//バリデーション配列定義
	$validationMsgs = array();
	
	/*座席番号を持ってくる処理*/
	
	/*******************/
	// テストデータ （revSeatSelect.tplから値を取得）
	$seat_position_list = array();
	$seat_position_list = array('1_1','1_2');
	$smarty->assign("seat_position_list",$seat_position_list);
	/*******************/

	if(empty($seat_position_list)) {
		//選択された座席がない場合		
		$validationMsgs[] = "座席を選択してください。";
	}
	
	if(empty($validationMsgs)) {
		try {
			$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
			$seatDAO = new SeatDAO($db);
			$reservationDAO = new ReservationDAO($db);
			
			//予約番号を確保
			$reservation = new Reservation();
			$reservation->setReservationId(NULL);
			$reservation->setMemberId($member_id);
			$reservation->setDate($now);
			$reservation->setScheduleId($schedule_id);
				
			$result = $reservationDAO->insertReservation($reservation);
			if ($result) {
				//確保した予約IDを取得する
				$reservation_id = $reservationDAO->findByLatestReservationId();
				
				//選択した座席をDBに格納する
				foreach ($seat_position_list as $key => $value) {
					$seat = new Seat();
					$seat->setSchedualId($schedule_id);
					$seat->setSeatPositon($seat_position_list[$key]);
					$seat->setReservationId($reservation_id);
					$seat->setCustomerPartitionId("general");//後で設定
					$seat->setMovieCategoryId($movie_category_id);
					$seatResult = $seatDAO->insertSeat($seat);
				}

				$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
				$smarty->assign("seat_detail",$seat_detail);

				if ($seatResult) {
					$isRedirect = true;
				}
			} else {
				$smarty->assign("errorMsg","座席選択に失敗しました。もう一度はじめからやり直してください。");
				$tplPath = "error.tpl";
			}
		} catch (PDOException $ex) {
			print_r($ex);
			$smarty->assign("errorMsg","接続障害が発生しました。再度お試しください。");
			$tplPath = "error.tpl";
		} finally {
			$db = null;
		}
	}
	
	$smarty->display($tplPath);
}