<?php
/**
 * 予約クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 予約エンティティクラス
 */
class Reservation {
	/**
	 * 予約ID
	 */
	private $reservation_id;
	/**
	 * 顧客ID
	 */
	private $member_id;
	/**
	 * 日時
	 */
	private $date;
	/**
	 * スケジュールID
	 */
	private $schedule_id;

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
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * @param mixed $member_id
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getScheduleId()
    {
        return $this->schedule_id;
    }

    /**
     * @param mixed $schedule_id
     */
    public function setScheduleId($schedule_id)
    {
        $this->schedule_id = $schedule_id;
    }



}
?>