<?php
/**
 * 監督クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 監督エンティティクラス
 */
class Director {
	/**
	 * 監督ID
	 */
	private $director_id;
	/**
	 * 監督名
	 */
	private $name;

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