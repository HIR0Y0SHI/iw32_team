<!DOCTYPE html>
<!--
{**
 * 購入者情報入力のテンプレート。
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
	<link href="css/buyer_input.css" rel="stylesheet" type="text/css">
	<title>HALシネマ | ご購入者情報の入力</title>
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
				<li class="current"><span>STEP.2</span><br/>お支払い情報の入力</li>
				<li><span>STEP.3</span><br/>購入内容の確認</li>
				<li><span>STEP.4</span><br/>完了</li>
			</ul>
		</div>
		
		<h2 class="title">ご購入に必要な情報を入力してください。</h2>
		<p class="description">座席数分の枚数を選択し、次へ進んでください。</p>
			
		<div class="content">
			
			<!--
			<div class="error">
				<h2>入力された内容を再度ご確認ください。</h2>
				<ul>
					<li>エラーチェックエラーチェック</li>
					<li>なんか間違っとるよ？ｗ</li>
				</ul>
			</div>
			-->
			
			
			<div class="inputitem">
				<section class="name">
					<h2>お名前</h2>
					<p><input type="text" name="" maxlength="10" value="" placeholder="例）山田"></p>
					<p><input type="text" name="" maxlength="10" value="" placeholder="例）太郎"></p>
					<p><input type="text" name="" maxlength="10" value="" placeholder="例）ヤマダ"></p>
					<p><input type="text" name="" maxlength="10" value="" placeholder="例）タロウ"></p>
				</section>
				<section class="tel">
					<h2>電話番号</h2>
					<p><input type="text" name="" maxlength="11" value="09012345678" disabled="disabled" ></p>
					<p><input type="hidden" name="" maxlength="11" value="09012345678"></p>
					<p><input type="tel" name="" maxlength="11" value="" placeholder="例）09000000000"></p>
				</section>
				<section class="mail">
					<h2>メールアドレス</h2>
					<p><input type="text" name="" maxlength="255" value="tamao@com.jp" disabled="disabled" ></p>
					<p><input type="hidden" name="" maxlength="255" value=""></p>
					<p><input type="text" name="" maxlength="255" value="" placeholder="例）hal@cinema.com.jp" ></p>
					<p><input type="text" name="" maxlength="255" value="" placeholder="例）hal@cinema.com.jp" ></p>
				</section>
				<section class="creditcard">
					<h2>クレジットカード</h2>
					<p><input type="text" name="" maxlength="19" value="************6100" disabled="disabled" ></p>
					<p><input type="hidden" name="" maxlength="19" value="************6100"></p>
					<p><input tylie="text" name="" maxlength="16" value="" placeholder="例）0000"></p>
					<p><input tylie="text" name="" maxlength="30" value="" placeholder="例）ヤマダ　タロウ"></p>
					<ul>
						<li>
							<select name="cc_month">
								<option value="">--</option>
								<option value="1">01</option>
								<option value="2">02</option>
								<option value="3">03</option>
								<option value="4">04</option>
								<option value="5">05</option>
								<option value="6">06</option>
								<option value="7">07</option>
								<option value="8">08</option>
								<option value="9">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						月</li>
						<li>
							<select name="cc_year">
								<option value="">--</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
							</select>&nbsp;年<br />
						</li>
					</ul>
					<p><input type="text" name="" maxlength="3" value="" placeholder="例）000"></p>
	
					
				</section>
			</div>
		</div>
			
		<div class="status_select">
			<table>
				<thead>
					<h1>鑑賞内容<span>Your Selection</span></h1>
				</thead>
				<tbody>
					<tr>
						<th>作品名</th>
						<td>君の名は。</td>
					</tr>
					<tr>
						<th>スクリーン</th>
						<td>3</td>
					</tr>
					<tr>
						<th>日時</th>
						<td>2016年8月26日<br>19:30〜20:30</td>
					</tr>
					<tr>
						<th>選択済み座席</th>
						<td>A-99,B-99,C-99,<br/>D-99,C-99,D-99</td>
					</tr>
					<tr>
						<th>券種・枚数</th>
						<td>
							一般：1,800円 × 1枚<br>
							大・高：1,500円 × 1枚<br>
							中・小：1,000円 × 1枚<br>
							幼児：800円 × 1枚<br>
							シニア：1,100円 × 1枚<br>
							レディースデー：1,100円 × 1枚<br>
							ナイトショー：1,300円 × 1枚<br>
						</td>
					</tr>
					<tr>
						<th>チケット料金</th>
						<td>99,999円</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		
		<div class="confirmation">	
			<div class="select_step">
				<p><input type="button" name="next" value="次へ"></p>
				<p><input type="button" name="back" value="席を選び直す"></p>
				<p><input type="button" name="back" value="スケジュールを選び直す"></p>
			</div>
			<div class="info">
				<h2>【ご注意事項】</h2>
				<p>インターネットでのチケット購入の際に、会員番号を入力しても鑑賞ポイント・マイルは登録できておりません。鑑賞ポイント・マイルはチケット受取時に登録していただきます。</p>
				<p>ご登録内容を変更されてもハルマイレージカード会員情報がご本人様以外に送付される可能性があります。</p>
				
				<h3>メールの受信について</h3>
				<p>メールアドレスは正しくご入力ください。誤入力により購入情報がご本人様以外に送付される可能性があります。また携帯電話のドメイン指定受信をご利用の場合は「i-net.ticket@haltheater.jp」をご指定ください。</p>
			</div>
			<div class="norton">
				<h2><img src="img/norton_logo.gif" alt=""></h2>
				<p>入力した内容はセキュリティソフトウェア（SSL）により保護されております。お客様の情報は全て暗号化され、インターネットで情報が送信される際に読み取られることはありません。</p>
				<p>For your privacy, our service is protected by SSL coding system. Your information is encrypted during transmission over the Internet and NEVER released to third parties of any kind.</p></div>
		</div>
		
	</section>
	<!-- メインコンテンツここまで -->

	<footer>
		<p><small>© Sorry it is not frank.Ink All Rights Reserved.</small></p>
	</footer>

</body>
</html>
