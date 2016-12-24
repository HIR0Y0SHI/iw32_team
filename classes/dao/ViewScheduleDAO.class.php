<?php
/**
 * ビューのDAO
 *
 * @author M.H
 * @version 1.0
 * Created: 2016/12/14
 * 作成者: 林 真秀
 */
/*
 *
 */
class ViewScheduleDAO {
	/**
	 * @var PDO DB接続オブジェクト
	 */
	private $db;

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
      $name_exp_7 = $row["Name_exp_7"];


			$viewschedule = new ViewSchedule();
			$viewschedule->setSchedualId($schedule_id);
			$viewschedule->setMovieId($movie_id);
			$viewschedule->setMovieName($movie_name);
			$viewschedule->setDoorsOpenTime($doors_open_time);
			$viewschedule->setClosingTime(  $closing_time);
			$viewschedule->setName($name);
			$viewschedule->setNameExp7($name_exp_7);
			$viewscheduleList[$movie_id] = $viewschedule;

		}
		return $viewscheduleList;
	}

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
      $name_exp_7 = $row["Name_exp_7"];


			$schedule = new ViewSchedule();
			$schedule->setSchedualId($schedule_id);
			$schedule->setMovieId($movie_id);
			$schedule->setMovieName($movie_name);
			$schedule->setDoorsOpenTime($doors_open_time);
			$schedule->setClosingTime($closing_time);
			$schedule->setName($name);
			$schedule->setNameExp7($name_exp_7);
			$scheduleList[$schedule_id] = $schedule;
		}
		return $scheduleList;
	}
}
