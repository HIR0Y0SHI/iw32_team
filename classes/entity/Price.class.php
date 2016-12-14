<?php
/**
 * 金額クラス
 * 
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 金額エンティティクラス
 */
class Price {
	/**
	 * 映画カテゴリー
	 */
	private $movie_category_id;
	/**
	 * 顧客パーティションID
	 */
	private $customer_partition_id;
	/**
	 * チケット名
	 */ 
	private $name;
	/**
	 * 金額
	 */
	private $price;

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
    public function getCustomerPartitionId()
    {
        return $this->customer_partition_id;
    }

    /**
     * @param mixed $customer_partition_id
     */
    public function setCustomerPartitionId($customer_partition_id)
    {
        $this->customer_partition_id = $customer_partition_id;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



}
?>