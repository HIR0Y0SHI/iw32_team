<?php
/**
 * クレジットカードクラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * クレジットカードエンティティクラス
 */
class Creditcard {
	/**
	 * 顧客ID
	 */
	private $member_id;
	/**
	 * クレジットカードNo
	 */
	private $card_no;

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
    public function getCardNo()
    {
        return $this->card_no;
    }

    /**
     * @param mixed $card_no
     */
    public function setCardNo($card_no)
    {
        $this->card_no = $card_no;
    }


}
?>