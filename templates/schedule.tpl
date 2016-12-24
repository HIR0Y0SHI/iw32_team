<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link href='./css/reset.css' rel='stylesheet' type='text/css'>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href='./css/common.css' rel='stylesheet' type='text/css'>
	<link href='./css/main.css' rel='stylesheet' type='text/css'>
	<link href='./css/schedule.css' rel='stylesheet' type='text/css'>

	<title>映画予約サイト</title>
</head>
<body>
	<script src="js/jquery-1.11.3.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
	<header>
		<h1><img src="img/aaa.gif" width="105px" height="20px"alt="ロゴ"></h1>
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
                          <p class="date">12月26日</p>
                          <p class="date_campain">レディースデイ</p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date"></p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date"></p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date"></p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date"></p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date"></p>
                      </td>
                  </tr>

                  <tr class="pull-left">
                      <td>
                          <p class="date"></p>
                      </td>
                  </tr>
              </tbody>
          </table>
     </div><!--date_list-->
		<!-- その日の映画スケジュール -->　
		<div class="schedule_list clearfix">
			<p class="movie_date">12月26日</p>
      <div class="schedule clearfix">

				<div class="movie_title">
					<p><span class="title">映画タイトル </span><span class="movie_time">上映時間[111分]</span></p>
				</div>

				<p class="movie_info clearfix"><a href="#">作品情報を見る</a></p>
          <div class="day_schedule clearfix">

              <ul class="info pull-left">
                  <li class="time"><span class="start_time">0:00</span>～0:00</li>
                  <li class="sheet_emp">空席あり</li>
              </ul>

              <ul class="info pull-left">
                  <li class="time">0:00～0:00</li>
                  <li class="sheet_emp">空席あり</li>
              </ul>

              <ul class="info pull-left">
                  <li class="time">0:00～0:00</li>
                  <li class="sheet_emp">空席あり</li>
              </ul>

              <ul class="info pull-left">
                  <li class="time">0:00～0:00</li>
                  <li class="sheet_emp">空席あり</li>
              </ul>

							<ul class="info pull-left">
                  <li class="time">0:00～0:00</li>
                  <li class="sheet_emp">空席あり</li>
              </ul>

							<ul class="info pull-left">
                  <li class="time">0:00～0:00</li>
                  <li class="sheet_emp">空席あり</li>
              </ul>
          </div>
			</div>
		</div>

	</section>
	<!-- メインコンテンツここまで -->

	<footer>
		<p><small>© Sorry it is not frank.Ink All Rights Reserved.</small></p>
	</footer>
</body>
</html>
