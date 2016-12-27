<?php
/**
 * 購入完了処理。
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/13
 * 
 * Updated by TAMA on 2016/12/27
 * 	- 会員番号を既存の値に変更
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/SeatDetail.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/Reservation.class.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/ReservationDAO.class.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Functions.php');

@session_start();

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . "/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'] . "/IW32_Team_Project/templates_c");

$tplPath = "rev/revPurchaseComplete.tpl";

//スケジュールIDの取得
$schedule_id = $_SESSION["schedule_id"];

//メンバーIDの取得
$member_id = MEMBER_ID;

//ムービーカテゴリの取得
$movie_category_id = $_SESSION["movie_category_id"];

//チケットの券種を取得
$ticket_select_kensyu = $_SESSION["ticket_select_kensyu"];

//入力された情報を取得
$input_date = $_SESSION["input_date"];

//現在時刻取得
$now = date("Y-m-d H:i:s");


//座席情報取得
$seat_position_list = $_SESSION["seat_position_list"];



if (empty($validationMsgs)) {
	try {
		$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
		$seatDAO = new SeatDAO($db);
		$reservationDAO = new ReservationDAO($db);

		//映画情報取得
		$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
		$_SESSION["seat_detail"] = $seat_detail;


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
			$i = 0;
			foreach ($seat_position_list as $key => $value) {					
				$seat = new Seat();
				$seat->setSchedualId($schedule_id);
				$seat->setSeatPositon($seat_position_list[$key]);
				$seat->setReservationId($reservation_id);
				$seat->setCustomerPartitionId($ticket_select_kensyu[$i]);//後で設定
				$seat->setMovieCategoryId($movie_category_id);
				$seatResult = $seatDAO->insertSeat($seat);

				$i++;
			}

		} else {
			$smarty->assign("errorMsg","座席選択に失敗しました。もう一度はじめからやり直してください。");
			$tplPath = "error.tpl";
		}
	} catch (PDOException $ex) {
		print_r($ex);
		$smarty->assign("errorMsg", "接続障害が発生しました。再度お試しください。");
		$tplPath = "error.tpl";
	} finally {
		$db = null;
	}
}

//なんとなく４桁にしたいので大きい方がぽいかなって。笑
if(strlen($reservation_id) == 1) {
	$reservation_id + "000";
} else if (strlen($reservation_id) == 2) {
	$reservation_id + "00";
} else if (strlen($reservation_id) == 3) {
	$reservation_id + "0";
}

$smarty->assign("reservation_id", $reservation_id);
$smarty->assign("input_date", $input_date);
$smarty->display($tplPath);