<!DOCTYPE html>
<!--
{**
 * チケット券種選択のテンプレート。
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 *}
-->
<html lang="ja">
<head>
	<meta charset="UTF-8">
<<<<<<< HEAD
	<link href="css/html5reset-1.6.1.css" rel="stylesheet" type="text/css">
	<link href="css/common.css" rel="stylesheet" type="text/css">
	<link href="css/seat_common.css" rel="stylesheet" type="text/css">
	<link href="css/ticket_select.css" rel="stylesheet" type="text/css">
	
=======
	<link href="/IW32_Team_Project/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/common.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/seat_common.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/ticket_select.css" rel="stylesheet" type="text/css">
>>>>>>> 3105c35f3e6b53b95850b818170e210c55550a46
	<title>HALシネマ | チケット選択</title>
</head>
<body>
	<header>
		<h1><img src="/IW32_Team_Project/img/aaa.gif" width="105" height="20" alt="ロゴ"></h1>
		<div id="seach">
			<input type="text" name="text">
			<input type="submit">

		</div><!--Rogin-->
	</header>


	<!-- ここからメインコンテンツ -->
	<section id="wrapper">

		<div class="bread_list">
			<ul>
				<li class="current"><span>STEP.1</span><br/>座席・チケット選択</li>
				<li><span>STEP.2</span><br/>お支払い情報の入力</li>
				<li><span>STEP.3</span><br/>購入内容の確認</li>
				<li><span>STEP.4</span><br/>完了</li>
			</ul>
		</div>

		<h2 class="title">チケットの種類をお選びください。</h2>
		<p class="description">座席数分の枚数を選択し、次へ進んでください。</p>

		<div class="content">

		<div class="error">
			<h2>入力された内容を再度ご確認ください。</h2>
			<ul>
				<li>エラーチェックエラーチェック</li>
				<li>エラーチェックエラーチェック</li>
			</ul>
		</div>
			<section class="ticket_select">
				<h2>合計◯枚分選択してください。</h2>
				<table>
					<tbody>
						<tr>
							<th>券種</th>
							<th>価格</th>
							<th>枚数</th>
							<th>注意</th>
						</tr>
						<tr>
							<td>一般</td>
							<td>￥1,800</td>
							<td>
								<select name="general">
									<option value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>枚
							</td>
							<td></td>
						</tr>
						<tr>
							<td>大・高校生</td>
							<td>￥1,500</td>
							<td>
								<select name="general">
									<option value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>枚
							</td>
							<td>ご入場の際に学生証をご提示下さい。</td>
						</tr>
						<tr>
							<td>中・小学生</td>
							<td>￥1,000</td>
							<td>
								<select name="general">
									<option value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>枚
							</td>
							<td></td>
						</tr>
						<tr>
							<td>幼児（3歳-6歳）</td>
							<td>￥800</td>
							<td>
								<select name="general">
									<option value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>枚
							</td>
							<td></td>
						</tr>
						<tr>
							<td>シニア（55歳以上）</td>
							<td>￥1,100</td>
							<td>
								<select name="general">
									<option value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>枚
							</td>
							<td>入場の際は年齢確認のできるものをご提示願います。</td>
						</tr>
						<tr>
							<td>レディースデー</td>
							<td>￥1,100</td>
							<td>
								<select name="general">
									<option value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>枚
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
				<h3>&lt;&lt;ご注意&gt;&gt;</h3>
				<p>※ １回あたりの購入限度枚数は合計6枚までとなります。</p>
				<p>※ メンバーズカード提示による割引やその他割引券などのご利用はできません。</p>
				<p>※ 車椅子席をご希望の方は、お手数ですが通常のお席をご購入の上、劇場にご連絡下さい。</p>
			</section>
		</div>

		<div class="status_select">
			<table>
				<thead>
					<h1>鑑賞内容<span>Your Selection</span></h1>
				</thead>
				<tbody>
					<tr>
						<th>作品名</th>
						<td>ここに作品名がはいりますねぇ〜〜〜〜〜〜〜〜</td>
					</tr>
					<tr>
						<th>スクリーン</th>
						<td>3</td>
					</tr>
					<tr>
						<th>日時</th>
						<td>2016年12月12日（？）<br>19:30〜20:30</td>
					</tr>
					<tr>
						<th>選択済み座席</th>
						<td>A-99,B-99,C-99,<br/>D-99,C-99,D-99</td>
					</tr>
				</tbody>
			</table>

		</div>

		<div class="confirmation">
			<div class="select_step">
				<p><a href="buyer_input.html"><input type="button" name="next" value="次へ"></a></p>
				<p><input type="button" name="back" value="席を選び直す"></p>
				<p><input type="button" name="back" value="スケジュールを選び直す"></p>
			</div>
		</div>

	</section>
	<!-- メインコンテンツここまで -->

	<footer>
		<p><small>© Sorry it is not frank.Ink All Rights Reserved.</small></p>
	</footer>

</body>
</html>
