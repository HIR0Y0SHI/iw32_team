<?php
/**
 * スケジュールクラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 映画スケジュールエンティティ
 */
class Schedule {
	/**
	 * スケジュールID
	 */
	private $schedual_id;
	/**
	 * 映画ID
	 */
	private $movie_id;
	/**
	 * 開始時間
	 */
	private $doors_open_time;
	/**
	 * 終了時間
	 */
	private $closing_time;
	/**
	 * スクリーンID
	 */
	private $screen_id;

	/**
	 * @return mixed
	 */
	public function getSchedualId()
	{
		return $this->schedual_id;
	}

	/**
	 * @param mixed $schedual_id
	 */
	public function setSchedualId($schedual_id)
	{
		$this->schedual_id = $schedual_id;
	}

	/**
	 * @return mixed
	 */
	public function getMovieId()
	{
		return $this->movie_id;
	}

	/**
	 * @param mixed $movie_id
	 */
	public function setMovieId($movie_id)
	{
		$this->movie_id = $movie_id;
	}

	/**
	 * @return mixed
	 */
	public function getDoorsOpenTime()
	{
		return $this->doors_open_time;
	}

	/**
	 * @param mixed $doors_open_time
	 */
	public function setDoorsOpenTime($doors_open_time)
	{
		$this->doors_open_time = $doors_open_time;
	}

	/**
	 * @return mixed
	 */
	public function getClosingTime()
	{
		return $this->closing_time;
	}

	/**
	 * @param mixed $closing_time
	 */
	public function setClosingTime($closing_time)
	{
		$this->closing_time = $closing_time;
	}

	/**
	 * @return mixed
	 */
	public function getScreenId()
	{
		return $this->screen_id;
	}

	/**
	 * @param mixed $screen_id
	 */
	public function setScreenId($screen_id)
	{
		$this->screen_id = $screen_id;
	}




}
?>	



	









