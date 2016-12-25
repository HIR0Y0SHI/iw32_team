<?php
/**
 * ビューのDAO
 *
 * @author M.H
 * @version 1.0
 * Created: 2016/12/14
 * 作成者: 林 真秀
 *
 * Updated by HIR0Y0SHI on 2016/12/24
 *  - findSchedule()の実装
 * Updated by HIR0Y0SHI on 2016/12/25
 *  - findSchedule()内で扱う開場・閉場時刻を表示用に整形
 */


/*
 *　ViewScheduleのDAOクラス
 */
class ViewScheduleDAO {
	/**
	 * @var PDO DB接続オブジェクト
	 */
	private $db;

	// 日付フォーマット
	const DATE_FORMAT = "H:i";

	/**
	 * コンストラクタ
	 *
	 * @param PDO $db DB接続オブジェクト
	 */
	public function __construct(PDO $db) {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->db = $db;
	}


	/**
	 * 全スケジュール検索。
	 *
	 * @return
	 */
	public function findAll() {
		$sql = "SELECT * FROM `v_schedual_detail_2`";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$viewscheduleList = array();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$schedule_id = $row["schedual_id"];
			$movie_id = $row["movie_id"];
			$movie_name = $row["movie_name"];
			$doors_open_time = $row["doors_open_time"];
			$closing_time = $row["closing_time"];
			$name = $row["name"];
			$reservation_rate = $row["Name_exp_7"];


			$viewschedule = new ViewSchedule();
			$viewschedule->setSchedualId($schedule_id);
			$viewschedule->setMovieId($movie_id);
			$viewschedule->setMovieName($movie_name);
			$viewschedule->setDoorsOpenTime($doors_open_time);
			$viewschedule->setClosingTime(  $closing_time);
			$viewschedule->setName($name);
			$viewschedule->setReservationRate($reservation_rate);
			$viewscheduleList[$movie_id] = $viewschedule;

		}
		return $viewscheduleList;
	}




	/**
	 * Created by HIROYOSHI on 2016/12/24
	 * 日付を受け取り、その日の上映スケジュールを返す
	 *
	 * @param  string $yyyy 年
	 * @param  string $mm   月
	 * @param  string $dd   日
	 * @return array スケジュール情報
	 */
	public function findSchedule($yyyy, $mm, $dd) {
		// SQLの生成
		$sql = "SELECT * FROM v_schedual_detail_2 " .
				"WHERE doors_open_time > '" . $yyyy . "-" . $mm . "-" . $dd . " 00:00:00' ".
				"AND closing_time < '" . $yyyy . "-" . $mm . "-" . $dd . " 23:59:59'";

		// 実行
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();

		// 結果を格納する
		$all_schedules = array();

		// MEMO: 絶対にMovie IDを格納
		$save_movie_id = 0;


		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			// データ取得
			$schedule_id = $row["schedual_id"];
			$movie_id = $row["movie_id"];
			$movie_name = $row["movie_name"];
			$doors_open_time = $row["doors_open_time"];
			$closing_time = $row["closing_time"];
			$name = $row["name"];
			$reservation_rate = $row["Name_exp_7"];

			// 日付を表示用に整形
			$date = new DateTime($doors_open_time);
			$doors_open_time = $date->format(self::DATE_FORMAT);
			$date = new DateTime($closing_time);
			$closing_time = $date->format(self::DATE_FORMAT);

			// ViewScheduleオブジェクトの生成
			$viewschedule = new ViewSchedule();
			$viewschedule->setSchedualId($schedule_id);
			$viewschedule->setMovieId($movie_id);
			$viewschedule->setMovieName($movie_name);
			$viewschedule->setDoorsOpenTime($doors_open_time);
			$viewschedule->setClosingTime(  $closing_time);
			$viewschedule->setName($name);
			$viewschedule->setReservationRate($reservation_rate);

			/**
			 * 扱いやすく整形
			 */
			// 映画毎に配列を分ける
			if ($save_movie_id != $movie_id) {
				$all_schedules[$movie_id] = array(
					'movie_id' => $movie_id,
					'movie_name' => $movie_name,
					'schedules' => array());
			}

			// 値をいい感じに格納
			$all_schedules[$movie_id]['schedules'][] = $viewschedule;



			// Movie IDの保存
			// MEMO: 次の映画と今回の映画を区別するため
			$save_movie_id = $movie_id;
		}

		return $all_schedules;
	}





	/**
	 * 謎
	 * Commented by HIR0Y0SHI on 2016/12/24
	 * @return [type] [description]
	 */
	public function findAllSchedule() {

		$sql = "SELECT * FROM `v_schedual_detail_2`　";
		$stmt = $this->db->prepare($sql);
		$result = $stmt->execute();
		$scheduleList = array();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$schedule_id = $row["schedual_id"];
			$movie_id = $row["movie_id"];
			$movie_name = $row["movie_name"];
			$doors_open_time = $row["doors_open_time"];
			$closing_time = $row["closing_time"];
			$name = $row["name"];
			$reservation_rate = $row["Name_exp_7"];


			$schedule = new ViewSchedule();
			$schedule->setSchedualId($schedule_id);
			$schedule->setMovieId($movie_id);
			$schedule->setMovieName($movie_name);
			$schedule->setDoorsOpenTime($doors_open_time);
			$schedule->setClosingTime($closing_time);
			$schedule->setName($name);
			$schedule->setReservationRate($reservation_rate);
			$scheduleList[$schedule_id] = $schedule;
		}
		return $scheduleList;
	}
}
