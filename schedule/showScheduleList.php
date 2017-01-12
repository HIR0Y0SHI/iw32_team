<?php
/**
* 説明
*
* @author M・H
* @version 1.0
* Created: 2016/12/14
* 作成者: 林 真秀
*
*  Updated by HIR0Y0SHI on 2016/12/24
*   - 当日スケジュールをtplに値を反映
 * 
 * Updated by TAMA on 2016/12/28
 * 	- 戻るボタンへの対応 - session_destroy();
*/

require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/libs/Smarty.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/Conf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/entity/ViewSchedule.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/classes/dao/ViewScheduleDAO.class.php';

$smarty = new Smarty();
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/templates/');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'] . '/IW32_Team_Project/templates_c/');
$tplPath = 'scheduleList.tpl';

@session_destroy();

try {
    $db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);

    $viewScheduleDAO = new ViewScheduleDAO($db);

    $scheduleList = $viewScheduleDAO->findSchedule("2016", "12", "13");
    $smarty->assign('daySchedules', $scheduleList);

} catch (PDOException $e) {
    print_r($e);
    $smarty->assign('errorMsg', 'DB接続に失敗しました。');
    $tplPath = 'error.tpl';
} finally {
    $db = null;
}


$smarty->display($tplPath);

?>
