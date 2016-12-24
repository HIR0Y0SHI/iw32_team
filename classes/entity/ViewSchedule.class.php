<?php
/**
 *
 * @author Shinzo SAITO <architshin@websarva.com>
 * @version 1.0
 * @copyright Sarva
 *
 * ファイル名=Schedule.class.php
 * 作成者: 林 真秀
 *
 * Updated by HIR0Y0SHI on 2016/12/24
 * 	- getNameExp7の修正
 *
 */

/**
 *
 */
class ViewSchedule {
	/**
	 * スケジュールID
	 */
	private $schedual_id;
	/**
	 * 映画ID
	 */
	private $movie_id;
	/**
	 * 映画名
	 */
	private $movie_name = "";
	/**
	 * 開場時間
	 */
	private $doors_open_time;
	/**
	 * 閉場時間
	 */
	private $closing_time;
	/**
	 * 上映言語
	 */
	private $name = "";
	/**
	 * 座席予約率
	 */
	private $reservation_rate;


	//スケジュールID
	public function getSchedualId()
	{
		return $this->schedual_id;
	}

	public function setSchedualId($schedual_id)
	{
		$this->schedual_id = $schedual_id;
	}


	//映画ID
	public function getMovieId()
	{
		return $this->movie_id;
	}

	public function setMovieId($movie_id)
	{
		$this->movie_id = $movie_id;
	}


	//映画名
	public function getMovieName()
	{
		return $this->movie_name;
	}

	public function setMovieName($movie_name)
	{
		$this->movie_name = $movie_name;
	}


	//開場時間
	public function getDoorsOpenTime()
	{
		return $this->doors_open_time;
	}

	public function setDoorsOpenTime($doors_open_time)
	{
		$this->doors_open_time = $doors_open_time;
	}


	//閉場時間
	public function getClosingTime()
	{
		return $this->closing_time;
	}

	public function setClosingTime($closing_time)
	{
		$this->closing_time = $closing_time;
	}


	//上映言語
	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}


	//座席予約率
	public function getReservationRate()
	{
		return $this->reservation_rate;
	}

	public function setReservationRate($reservation_rate)
	{
		$this->reservation_rate = $reservation_rate;
	}

}
?>
