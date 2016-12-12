<?php
/**
 * DB接続テスト
 *
 * @author HIROYOSHI
 * @version 1.0
 * Created: 2016/12/11
 */



require_once($_SERVER['DOCUMENT_ROOT'].'/IW32_Team_Project/classes/Conf.php');


try {
  $db = new PDO(DB_DNS, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  $sql = "SELECT * FROM m_member";
  $stmt = $db->prepare($sql);
  $result = $stmt->execute();
  $list = array();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      var_dump($row);
      echo "<br />----------------------------------------------------<br />";
  }

} catch (PDOException $ex) {
  var_dump($ex);
} finally {
  $db = null;
}


 ?>
