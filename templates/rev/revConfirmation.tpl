<!DOCTYPE html>
<!--
{**
 * 購入内容確認のテンプレート。
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 *}
-->
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link href="css/html5reset-1.6.1.css" rel="stylesheet" type="text/css">
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/seat_common.css" rel="stylesheet" type="text/css">
	<link href="css/buyer_confirmation.css" rel="stylesheet" type="text/css">
	<title>HALシネマ | 購入内容の確認</title>
</head>
<body>
	<header>
		<h1><img src="img/aaa.gif" width="105" height="20" alt="ロゴ"></h1>
		<div id="seach">
			<input type="text" name="text">
			<input type="submit">

		</div><!--Rogin-->
	</header>


	<!-- ここからメインコンテンツ -->
	<section id="wrapper">
		
		<div class="bread_list">
			<ul>
				<li><span>STEP.1</span><br/>座席・チケット選択</li>
				<li><span>STEP.2</span><br/>お支払い情報の入力</li>
				<li class="current"><span>STEP.3</span><br/>購入内容の確認</li>
				<li><span>STEP.4</span><br/>完了</li>
			</ul>
		</div>
		
		<h2 class="title">内容をご確認のうえ、ご購入ください。</h2>
		<p class="description">※ご購入は画面下の「購入を確定する」ボタンをクリックするまで確定されません。</p>
		
		<div class="content">	
			<section class="purchase_details">
				<h2>ご購入内容<input type="button" value="変更"></h2>
				<p>君の名は。</p>	
				<p>2016年8月26日<br>19:30〜20:30</p>
				<p>3</p>
				<p>A-99,B-99,C-99,D-99,C-99,D-99</p>
				<p>
					一般：1,800円 × 1枚<br>
					大・高：1,500円 × 1枚<br>
					中・小：1,000円 × 1枚<br>
					幼児：800円 × 1枚<br>
					シニア：1,100円 × 1枚<br>
					レディースデー：1,100円 × 1枚<br>
					ナイトショー：1,300円 × 1枚<br>
				</p>
				<p>99,999円</p>
			</section>
			<section class="purchase_details">
				<h2>ご購入者情報<input type="button" value="変更"></h2>
				<p>山田太郎</p>	
				<p>090-0000-0000</p>
				<p>hal_cinema@com.jp</p>
			</section>
			<section class="purchase_details">
				<h2>お支払い情報<input type="button" value="変更"></h2>
				<p>**********0123**</p>	
				<p>ヤマダ タロウ</p>
				<p>99,999</p>
				<p>2017 / 10</p>
			</section>
			
			<section class="important_points">
				<div class="toggle">
					<h2>ご購入に際しての確認事項<span>※必ずお読みください</span></h2>
					<ul>
						<li>他のお客様のご迷惑となりますので途中入場はご遠慮ください。</li>
						<li>遅れてご来場の場合は座席の変更もございます。</li>
						<li>やむを得ず、上映スクリーンを変更する場合がございます。その際、座席が変更になる場合がございますのであらかじめご了承ください</li>
					</ul>
				</div>
			</section>
			<section class="contract">
				<h2>ご購入に関しての利用規約</h2>
					<p>一度購入された後は、交通渋滞による来場遅延など、その他いかなる場合でも変更およびキャンセルは致しかねます。</p>
					<p>18歳未満の方は終映が23：00（大阪府・岐阜県・高知県は22：00）を過ぎる上映回にはご入場いただけません。そのため、高校生以下の方のチケット購入はお受け出来かねます。また、大阪府においては16歳未満の方で保護者同伴でない場合は19：00を過ぎる上映回はご入場いただけません。あらかじめご了承ください。</p>
					<p>携帯電話のドメイン指定受信をご利用の場合は「i-net.ticket@haltheater.jp」をご指定ください。</p>
			</section>
		</div>
			
		<div class="confirmation">
			<p class="agreement">
				<input type="checkbox" name="" id="agree">
				<label for="agree" class="checkbox">上記の利用規約に同意する</label>
			</p>
			<div class="select_step">
				<p><input type="button" name="next" value="購入を確定する"></p>
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
