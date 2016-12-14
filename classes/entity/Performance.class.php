<?php
/**
 * 出演者クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 出演者エンティティクラス
 */
class Performance {
	/**
	 * 映画ID
	 */
	private $performer_id;
	/**
	 * 出演者ID
	 */
	private $name;

	/**
	 * @return mixed
	 */
	public function getPerformerId()
	{
		return $this->performer_id;
	}

	/**
	 * @param mixed $performer_id
	 */
	public function setPerformerId($performer_id)
	{
		$this->performer_id = $performer_id;
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




}
?>
	









