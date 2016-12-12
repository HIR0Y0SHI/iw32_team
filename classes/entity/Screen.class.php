<?php
/**
 * スクリーンだお
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * スクリーンエンティティ
 */
class Screen {
	/**
	 * スクリーンID
	 */
	private $screen_id;
	/**
	 * スクリーン名
	 */
	private $name;
	/**
	 * 席数
	 */
	private $number_of_seats;

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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
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

	
	
}
?>	



	









