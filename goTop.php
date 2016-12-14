<?php
/**
 * とりあえずテスト用。ログイン後のTOPへ行く感じのページ
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/14
 */

 @session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Functions.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates_c");

if (loginCheck()) {
	$validationMsgs[] = "ログインしていないか、前回ログインしてから一定時間が経過しています。もう一度ログインし直してください。";
	$smarty->assign("validationMsgs", $validationMsgs);
	$tplPath = "login.tpl";
} else {
	$userName = $_SESSION['last_name'];
	$member_id = $_SESSION['member_id'];

	cleanSession();

	$_SESSION['last_name'] = $userName;
	$_SESSION['member_id'] = $member_id;
	$smarty->assign("loginName",$_SESSION['last_name']);
	$smarty->assign("member_id",$_SESSION['member_id']);
	$tplPath = "top.tpl";
}

$smarty->display($tplPath);
?>
