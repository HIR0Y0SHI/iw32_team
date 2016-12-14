<?php
/**
 * 座席クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 映画情報取得エンティティクラス
 */
class SeatDetail {
	/**
	 * スケジュールID
	 */
	private $schedual_id;
	/**
	 * 上映日
	 */
	private $screening_day;
	/**
	 * 開始時間
	 */
	private $open_time;
	/**
	 * 終了時間
	 */
	private $close_time;
	/**
	 * スクリーンID
	 */
	private $screen_id;
	/**
	 * 席数
	 */
	private $number_of_seats;
	/**
	 * 映画タイトル
	 */
	private $movie_name;
	/**
	 * 上映カテゴリーID
	 */
	private $movie_category_id;
	 /**
     * 対象年齢
     */
    private $age;

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
	public function getScreeningDay()
	{
		return $this->screening_day;
	}

	/**
	 * @param mixed $screening_day
	 */
	public function setScreeningDay($screening_day)
	{
		$this->screening_day = $screening_day;
	}
	
   /**
	 * @return mixed
	 */
	public function getOpenTime()
	{
		return $this->OpenTime;
	}

	/**
	 * @param mixed $open_time
	 */
	public function setOpenTime($open_time)
	{
		$this->OpenTime = $open_time;
	}

	/**
	 * @return mixed
	 */
	public function getCloseTime()
	{
		return $this->close_time;
	}

	/**
	 * @param mixed $close_time
	 */
	public function setCloseTime($close_time)
	{
		$this->close_time = $close_time;
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
	
	/**
	 * @return mixed
	 */
	public function getNumberOfSeats()
	{
		return $this->number_of_seats;
	}

	/**
	 * @param mixed $number_of_seats
	 */
	public function setNumberOfSeats($number_of_seats)
	{
		$this->number_of_seats = $number_of_seats;
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
}
?>