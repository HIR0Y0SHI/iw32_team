<?php
/**
 * メンバークラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 顧客エンティティクラス
 */
class Member {
	/**
	 * 顧客ID
	 */
	private $member_id;
	/**
	 * ログインID
	 */
	private $login_id;
	/**
	 * パスワード
	 */ 
	private $password;
	/**
	 * 姓
	 */
	private $last_name;
	/**
	 * 名
	 */
	private $first_name;
	/**
	 * セイ
	 */ 
	private $first_name_kana;
	/**
	 * 性別
	 */
	private $last_name_kana;
	/**
	 * メイ
	 */
	private $sex;
	/**
	 * 郵便番号
	 */ 
	private $postal_code;
	/**
	 * 都道府県
	 */
	private $prefectures;
	/**
	 * 市町村
	 */
	private $city;
	/**
	 * 住所
	 */
	private $address;
	/**
	 * アパート・その他
	 */
	private $apartment;
	/**
	 * 電話番号
	 */
	private $tel;
	/**
	 * メールアドレス
	 */
	private $mail;
	/**
	 * 誕生日
	 */
	private $birthday;
	/**
	 * 入会日
	 */
	private $entry_date;
	/**
	 * 退会日
	 */
	private $withdrawal_day;

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
    public function getLoginId()
    {
        return $this->login_id;
    }

    /**
     * @param mixed $login_id
     */
    public function setLoginId($login_id)
    {
        $this->login_id = $login_id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getFirstNameKana()
    {
        return $this->first_name_kana;
    }

    /**
     * @param mixed $first_name_kana
     */
    public function setFirstNameKana($first_name_kana)
    {
        $this->first_name_kana = $first_name_kana;
    }

    /**
     * @return mixed
     */
    public function getLastNameKana()
    {
        return $this->last_name_kana;
    }

    /**
     * @param mixed $last_name_kana
     */
    public function setLastNameKana($last_name_kana)
    {
        $this->last_name_kana = $last_name_kana;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }

    /**
     * @return mixed
     */
    public function getPrefectures()
    {
        return $this->prefectures;
    }

    /**
     * @param mixed $prefectures
     */
    public function setPrefectures($prefectures)
    {
        $this->prefectures = $prefectures;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * @param mixed $apartment
     */
    public function setApartment($apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entry_date;
    }

    /**
     * @param mixed $entry_date
     */
    public function setEntryDate($entry_date)
    {
        $this->entry_date = $entry_date;
    }

    /**
     * @return mixed
     */
    public function getWithdrawalDay()
    {
        return $this->withdrawal_day;
    }

    /**
     * @param mixed $withdrawal_day
     */
    public function setWithdrawalDay($withdrawal_day)
    {
        $this->withdrawal_day = $withdrawal_day;
    }



}
?>