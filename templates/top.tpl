<!DOCTYPE html>
<!--
{**
 * とっぷだお。まーくんの映画スケジュール選択画面
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 *}
-->
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Shinzo SAITO">
		<title> スケジュール画面</title>
	</head>
	<body>
		<header>
			<h1>すけじゅーる選択画面な気がする</h1>
			<ul>
				<li>ようこそ {$loginName} 様</li>
				<li>会員番号 {$member_id} </li>
			</ul>
		</header>
		<nav>
			<ul>
				<form action="/IW32_Team_Project/rev/revPrepareSeat.php" method="post">
					<li>すけじゅーる番号入力してね〜 ： <input type="text" name="schedule_id">　存在しないID入れないでね〜</li>
					<li><input type="submit" value="映画の座席予約するよ！"></li>
				</form>
			</ul>
		</nav>
	</body>
</html>
	