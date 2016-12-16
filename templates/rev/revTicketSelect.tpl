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

	<link href="/IW32_Team_Project/css/html5reset-1.6.1.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/common.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/seat_common.css" rel="stylesheet" type="text/css">
	<link href="/IW32_Team_Project/css/ticket_select.css" rel="stylesheet" type="text/css">

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
				<li><span>STEP.1</span><br/>座席選択</li>
				<li class="current"><span>STEP.2</span><br/>チケット選択</li>
				<li><span>STEP.3</span><br/>お支払い情報の入力</li>
				<li><span>STEP.4</span><br/>購入内容の確認</li>
				<li><span>STEP.5</span><br/>完了</li>
			</ul>
		</div>

		<h2 class="title">チケットの種類をお選びください。</h2>
		<p class="description">座席数分の枚数を選択し、次へ進んでください。</p>
		
		<form action="revTicketSelect.php" method="POST">
		<div class="content">
	
		{if isset($validationMsgs)}
		<div class="error">
			<h2>入力された内容を再度ご確認ください。</h2>
			<ul>
				{foreach from=$validationMsgs item=msg name="validationMsgsLoop"}
				<li>{$msg}</li>
				{/foreach}
			</ul>
		</div>
		{/if}
		
			<section class="ticket_select">
				<h2>合計{$seat_position_list|@count}枚分選択してください。</h2>
				<table>
					<tbody>
						<tr>
							<th>券種</th>
							<th>価格</th>
							<th>枚数</th>
							<th>注意</th>
						</tr>
						{foreach from=$ticket_price_list item="ticket_price" name="loop"}
							<tr>
								<td>{$ticket_price->getName()}</td>
								<td>￥{$ticket_price->getPrice()}</td>
								<td>
									<select name="{$ticket_price->getCustomerPartitionId()}">
										<option value="">0</option>
										{foreach from=$seat_position_list item="seat_position" name="loop"}
											<option value="{$smarty.foreach.loop.iteration}">{$smarty.foreach.loop.iteration}</option>
										{/foreach}
									</select>枚
								</td>
								<td></td>
							</tr>
						{/foreach}
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
						<td>{$seat_detail->getMovieName()}</td>
					</tr>
					<tr>
						<th>スクリーン</th>
						<td>{$seat_detail->getScreenId()}</td>
					</tr>
					<tr>
						<th>日時</th>
						<td>{$seat_detail->getScreeningDay()}<br>{$seat_detail->getOpenTime()} 〜 {$seat_detail->getCloseTime()}</td>
					</tr>
					<tr>
						<th>選択済み座席</th>
						<td>
							{foreach from=$seat_position_list item="seat_position" name="loop"}
								{if $smarty.foreach.loop.index == 2}
									{$seat_position}</br>
								{elseif $smarty.foreach.loop.last}
									{$seat_position}
								{else}
									{$seat_position},							
								{/if}
							{/foreach}
						</td>
						
					</tr>
				</tbody>
			</table>

		</div>

		<div class="confirmation">
			<div class="select_step">
				<p><input type="submit" name="next" value="次へ"></p>
				<p><input type="button" name="back" value="席を選び直す"></p>
				<p><input type="button" name="back" value="スケジュールを選び直す"></p>
			</div>
		</div>
		</form>

	</section>
	<!-- メインコンテンツここまで -->

	<footer>
		<p><small>© Sorry it is not frank.Ink All Rights Reserved.</small></p>
	</footer>

</body>
</html>
