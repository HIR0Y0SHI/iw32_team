<?php
/**
 * 座席クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 座席エンティティクラス
 */
class Seat {
	/**
	 * スケジュールID
	 */
	private $schedual_id;
	/**
	 * 座席番号
	 */
	private $seat_positon;
	/**
	 * 予約番号
	 */ 
	private $reservation_id;
	/**
	 * チケット券種
	 */
	private $customer_partition_id;
	/**
	 * 映画カテゴリー
	 */
	private $movie_category_id;

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
    public function getSeatPositon()
    {
        return $this->seat_positon;
    }

    /**
     * @param mixed $seat_positon
     */
    public function setSeatPositon($seat_positon)
    {
        $this->seat_positon = $seat_positon;
    }

    /**
     * @return mixed
     */
    public function getReservationId()
    {
        return $this->reservation_id;
    }

    /**
     * @param mixed $reservation_id
     */
    public function setReservationId($reservation_id)
    {
        $this->reservation_id = $reservation_id;
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

  

}
?>