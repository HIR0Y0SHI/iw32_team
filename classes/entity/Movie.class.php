<?php
/**
 * 映画クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 映画エンティティクラス
 */
class Movie {
	/**
	 * 映画ID
	 */
	private $movie_id;
	/**
	 * 映画タイトル
	 */
	private $movie_name;
	/**
	 * 紹介文
	 */
	private $introduction;
	/**
	 * 上映時間
	 */
	private $running_time;
	/**
	 * 開始時期
	 */
	private $start_date;
	/**
	 * 開閉時期
	 */
	private $end_date;
	/**
	 * 年齢制限Id
	 */
	private $age_limit_id;
	/**
	 * 監督ID
	 */
	private $director_id;
	/**
	 * 映画ジャンルID
	 */
	private $movie_genre_id;
	/**
	 * 上映カテゴリーID
	 */
	private $movie_category_id;
	/**
	 * 言語ID
	 */
	private $language_id;

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
	public function getMovieName()
	{
		return $this->movie_name;
	}

	/**
	 * @param mixed $movie_name
	 */
	public function setMovieName($movie_name)
	{
		$this->movie_name = $movie_name;
	}

	/**
	 * @return mixed
	 */
	public function getIntroduction()
	{
		return $this->introduction;
	}

	/**
	 * @param mixed $introduction
	 */
	public function setIntroduction($introduction)
	{
		$this->introduction = $introduction;
	}

	/**
	 * @return mixed
	 */
	public function getRunningTime()
	{
		return $this->running_time;
	}

	/**
	 * @param mixed $running_time
	 */
	public function setRunningTime($running_time)
	{
		$this->running_time = $running_time;
	}

	/**
	 * @return mixed
	 */
	public function getStartDate()
	{
		return $this->start_date;
	}

	/**
	 * @param mixed $start_date
	 */
	public function setStartDate($start_date)
	{
		$this->start_date = $start_date;
	}

	/**
	 * @return mixed
	 */
	public function getEndDate()
	{
		return $this->end_date;
	}

	/**
	 * @param mixed $end_date
	 */
	public function setEndDate($end_date)
	{
		$this->end_date = $end_date;
	}

	/**
	 * @return mixed
	 */
	public function getAgeLimitId()
	{
		return $this->age_limit_id;
	}

	/**
	 * @param mixed $age_limit_id
	 */
	public function setAgeLimitId($age_limit_id)
	{
		$this->age_limit_id = $age_limit_id;
	}

	/**
	 * @return mixed
	 */
	public function getDirectorId()
	{
		return $this->director_id;
	}

	/**
	 * @param mixed $director_id
	 */
	public function setDirectorId($director_id)
	{
		$this->director_id = $director_id;
	}

	/**
	 * @return mixed
	 */
	public function getMovieGenreId()
	{
		return $this->movie_genre_id;
	}

	/**
	 * @param mixed $movie_genre_id
	 */
	public function setMovieGenreId($movie_genre_id)
	{
		$this->movie_genre_id = $movie_genre_id;
	}

	/**
	 * @return mixed
	 */
	public function getMovieCategoryId()
	{
		return $this->movie_category_id;
	}

	/**
	 * @param mixed $movie_category_id
	 */
	public function setMovieCategoryId($movie_category_id)
	{
		$this->movie_category_id = $movie_category_id;
	}

	/**
	 * @return mixed
	 */
	public function getLanguageId()
	{
		return $this->language_id;
	}

	/**
	 * @param mixed $language_id
	 */
	public function setLanguageId($language_id)
	{
		$this->language_id = $language_id;
	}



}
?>
	









