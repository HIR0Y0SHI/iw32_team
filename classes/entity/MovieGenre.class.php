<?php
/**
 * 映画ジャンルクラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 映画ジャンルエンティティ
 */
class MovieGenre {
	/**
	 * 映画ジャンルID
	 */
	private $movie_genre_id;
	/**
	 * ジャンル名
	 */
	private $name;

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
	









