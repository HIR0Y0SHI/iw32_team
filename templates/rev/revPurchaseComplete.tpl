<!DOCTYPE html>
<!--
{**
 * チケット購入完了のテンプレート。
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/22
 *}
-->
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link href="/IW32_Team_Project/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/common.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/seat_common.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/complete.css" rel="stylesheet" type="text/css">
	<title>HALシネマ | 購入完了</title>
</head>
<body>
	<header>
		<h1><img src="/IW32_Team_Project/img/aaa.gif" width="105px" height="20px" alt="ロゴ"></h1>
		<div id="seach">
			<input type="text" name="text">
			<input type="submit">

		</div><!--Rogin-->
	</header>


	<!-- ここからメインコンテンツ -->
	<section id="wrapper">
		
		<div class="bread_list">
			<ul>
				<li><span>STEP.1</span><br/>座席選択</li>
				<li><span>STEP.2</span><br/>チケット選択</li>
				<li><span>STEP.3</span><br/>お支払い情報の入力</li>
				<li><span>STEP.4</span><br/>購入内容の確認</li>
				<li class="current"><span>STEP.5</span><br/>購入完了</li>
			</ul>
		</div>
		
		<h2 class="title">ご購入ありがとうございました。ご来場お待ちしております。</h2>
		
		<p class="description">{$input_date.last_name} {$input_date.first_name} 様　追って購入内容を記載した購入完了メールをお送りします。</p>
		<p class="description important">チケットの発券の際には以下の番号が必要になります。</p>
		
		<div class="content">	
			<section class="purchase_details">
				<h2>予約番号</h2>
				<p>{$reservation_id}</p>	
			
			</section>
			<section class="purchase_details">
				<h2>お客様氏名</h2>
				<p>{$input_date.last_name} {$input_date.first_name}</p>
			</section>
		</div>
		
		<div class="ticket_detail">
			<h2>チケットの発券について</h2>
			<p><img src="/IW32_Team_Project/img/pit_image.jpg" alt="pit"></p>
			<p>チケットは、劇場内設置のチケット自動発券機（写真）にて購入完了メールで送信された「予約番号」と「お客様氏名」を入力していただくと発券できます。混み合う人気作品でも窓口に並ぶ必要はありません。<br><br>クレジットカードをご利用いただき、セキュリティコードによる認証を行なわないを選択された方は、チケット発券の際に決済で使用したクレジットカードが必要です。必ず劇場へお持ちください。<br><br><span>チケット自動発券機の操作方法についてはこちら</span></p>
		</div>
			
		<div class="confirmation">
			<div class="select_step">
				<p><input type="button" name="back" value="サイトトップへ戻る" onClick="location.href='/IW32_Team_Project/schedule/showScheduleList.php'"></p>
			</div>
			<div class="norton">
				<h2><img src="img/norton_logo.gif" alt=""></h2>
				<p>入力した内容はセキュリティソフトウェア（SSL）により保護されております。</p>
				<p>お客様の情報は全て暗号化され、インターネットで情報が送信される際に読み取られることはありません。</p>
				<p>For your privacy, our service is protected by SSL coding system. </p>
				<p>Your information is encrypted during transmission over the Internet and NEVER released to third parties of any kind.</p></div>
		</div>
		
	</section>
	<!-- メインコンテンツここまで -->

	<footer>
		<p><small>© Sorry it is not frank.Ink All Rights Reserved.</small></p>
	</footer>

</body>
</html>
