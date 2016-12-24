<?php
/**
* 説明
*
* @author M・H
* @version 1.0
* Created: 2016/12/14
* 作成者: 林 真秀
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/ViewSchedule.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/ViewScheduleDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/templates_c/');
$tplPath = 'scheduleList.tpl';



try {
    $db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
    $viewScheduleDAO = new ViewScheduleDAO($db);
    $viewScheduleList = $viewScheduleDAO->findAll();
    $scheduleList = $viewScheduleDAO->findAllSchedule();
    $smarty->assign('viewScheduleList', $viewScheduleList);
    $smarty->assign('scheduleList', $scheduleList);
    //print_r($viewScheduleList);
} catch (PDOException $e) {
    print_r($e);
    $smarty->assign('errorMsg', 'DB接続に失敗しました。');
    $tplPath = 'error.tpl';
}

finally {
    $db = null;
}


$smarty->display($tplPath);

?>
