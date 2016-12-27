<?php
/**
* 共通関数記述ファイル
*
* @author TAMA
* @version 1.0
* Created: 2016/12/12
*/

/**
 * ログイン済みかどうかをチェックする関数。
 * セッションからログイン情報が見つからない場合はログアウト状態と判定する。
 * 
 * Created by TAMA on 2016/12/14
 * 
 * @return boolean ログアウト状態の場合はtrue、ログイン状態の場合はfalse。
 */
function loginCheck() {
	
	$result = false;
	
	if(!isset($_SESSION["loginFlg"]) || $_SESSION["loginFlg"] == false || !isset($_SESSION["member_id"])) {
		$result = true;
	}
	
	return $result;
}

?>