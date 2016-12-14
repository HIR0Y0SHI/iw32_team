<?php
/**
 * 座席表示処理。
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/13
 * Updated by HIROYOSHI on 2016/12/25
 */

@session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/Seat.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/entity/SeatDetail.class.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/dao/SeatDAO.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Functions.php');
$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates_c");

$tplPath = "rev/revSeatSelect.tpl";

if(isset($_SESSION["flashMsg"])) {
	$flashMsg = $_SESSION["flashMsg"];
	$smarty->assign("flashMsg", $flashMsg);
	unset($_SESSION["flashMsg"]);
}

////////////////////////////
//テストデータ
//$schedule_id = 8;
$schedule_id = $_POST["schedule_id"];
////////////////////////////



$seat_detail = new SeatDetail();
$reserved_seat_list = array();
try {
	$db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
	$seatDAO = new SeatDAO($db);

	$seat_detail = $seatDAO->findFromMovieDetail($schedule_id);
	$reserved_seat_list = $seatDAO->findByPK($schedule_id);

	$_SESSION["reserved_count"] = count($reserved_seat_list);


	$unavailable_seats = array_keys($reserved_seat_list);

	$smarty->assign("seat_detail", $seat_detail);
	$smarty->assign("reserved_seat_list", $reserved_seat_list);
	$smarty->assign("unavailable_seats", json_encode($unavailable_seats));

} catch (PDOException $ex) {
	print_r($ex);
	$smarty->assign("errorMsg","接続障害が発生しました。再度お試しください。");
	$tplPath = "error.tpl";
} finally {
	$db = null;
}


$smarty->display($tplPath);
?>
