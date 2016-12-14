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

/**
 * Session情報の掃除関数。
 * ログイン情報以外のセッション中の情報を一度破棄する。
 * 各ユースケース最初の実行phpでこの関数を実行する。
 * 
 * Created by TAMA on 2016/12/14
 */
function cleanSession() {
	$loginFlg = $_SESSION["loginFlg"];
	$member_id = $_SESSION["member_id"];
	
	session_unset();
	
	$_SESSION["loginFlg"] = $loginFlg;
	$_SESSION["member_id"] = $member_id;
}
?>