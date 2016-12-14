<!DOCTYPE html>
<!--
{**
 * とりあえずテスト用。ユーザ情報入力ページ。あとからデザインやりまつ。
 *
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/14
 *}
-->
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="TAMAO">
		<title>ログイン | </title>
	</head>
	<body>
		<h1>ログイン</h1>
		{if isset($validationMsgs)}
			<section id="errorMsg">
				<p>以下のメッセージをご確認ください。</p>
				<ul>
					{foreach from=$validationMsgs item=msg name="validationMsgsLoop"}
					<li>{$msg}</li>
					{/foreach}
				</ul>
			</section>
		{/if}
		<section>
			<p>
				IDとパスワードを入力し、ログインをクリックしてください。
			</p>
			<form action="/IW32_Team_Project/login.php" method="post">
				<table>
					<tbody>
						<tr>
							<th>ID</th>
							<td>
								<input type="text" id="loginId" name="login_id" value="{$login_id|default:""}">
							</td>
						</tr>
						<tr>
							<th>パスワード</th>
							<td>
								<input type="password" id="login_ps" name="login_ps">
							</td>
						</tr>
						<tr>
							<td colspan="2" class="submit">
								<input type="submit" value="ログイン">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</section>
	</body>
</html>
	