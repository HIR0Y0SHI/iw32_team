<!-- 12/22 -->
<!-- 作成者:林 真秀 -->
<!--
  Updated by HIR0Y0SHI on 2016/12/24
   - 当日スケジュールの値を表示
 -->
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link href='/IW32_Team_Project/css/reset.css' rel='stylesheet' type='text/css'>
	<link href='/IW32_Team_Project/css/bootstrap.css' rel='stylesheet'>
	<link href='/IW32_Team_Project/css/common.css' rel='stylesheet' type='text/css'>
	<link href='/IW32_Team_Project/css/main.css' rel='stylesheet' type='text/css'>
	<link href='/IW32_Team_Project/css/schedule.css' rel='stylesheet' type='text/css'>

	<title>映画予約サイト</title>
</head>
<body>
	<script src="/IW32_Team-Project/js/jquery-1.11.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/IW32_Team-Project/js/bootstrap.js"></script>
	<header>
		<h1><img src="/IW32_Team_Project/img/aaa.gif" width="105px" height="20px"alt="ロゴ"></h1>
		<div id="seach">
			<input type="text" name="text">
			<input type="submit">
		</div><!--Rogin-->
	</header>
	<!-- ここからメインコンテンツ -->
	<section id="wrapper">
			<!-- 日付のリスト -->
      <div class="date_list clearfix">
        <h2 class="title_schedule">上映スケジュール</h2>
           <table class="table clearfix">
              <tbody>
                  <tr class="pull-left">
                      <td>
                          <p class="date">12月13日</p>
                          <p class="date_campain">レディースデイ</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date">12月14日</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date">12月15日</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date">12月16日</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date">12月17日</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date">12月18日</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date">12月19日</p>
                      </td>
                  </tr>
              </tbody>
          </table>
     </div><!--date_list-->
		<!-- その日の映画スケジュール -->　
		<div class="schedule_list clearfix">
			<p class="movie_date">12月13日</p>

			{foreach from=$daySchedules item='scheduleList' name='scheduleList'}
      <div class="schedule clearfix">
				<div class="movie_title">
					<p><span class="title">{$scheduleList['movie_name']}</span></p>
				</div>

				<p class="movie_info clearfix"><a href="#">作品情報を見る</a></p>

        <div class="day_schedule clearfix">
					{foreach from=$scheduleList['schedules'] item='schedule' name='schedule'}
            <ul class="info pull-left">
                <li class="time"><span class="start_time">{$schedule->getDoorsOpenTime()}</span> ～ {$schedule->getClosingTime()}</li>
                <li class="sheet_emp">{$schedule->getName()}</li>
            </ul>
					{/foreach}
        </div>

			</div>
			{/foreach}
		</div>

	</section>
	<!-- メインコンテンツここまで -->

	<footer>
		<p><small>© Sorry it is not frank.Ink All Rights Reserved.</small></p>
	</footer>
</body>
</html>
