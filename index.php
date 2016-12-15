<?php
/**
 * とりあえずテスト用。ここから始まる感じのページ
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/14
 */
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/libs/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates/");
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT']."/IW32_Team_Project/templates_c");

$tplPath = "login.tpl";

$smarty->display($tplPath);
?>
