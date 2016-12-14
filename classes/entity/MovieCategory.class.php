<?php
/**
 * 映画カテゴリークラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 映画カテゴリーエンティティクラス
 */
class MovieCategory {
	/**
	 * 上映カテゴリーID
	 */
	private $movie_category_id;
	/**
	 * カテゴリー名
	 */
	private $name;

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
	









