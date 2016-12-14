<?php
/**
 * 年齢制限クラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */


/***
 * 年齢制限エンティティクラス
 */
class AgeLimit {
    /**
     * 年齢制限ID
     */
    private $age_limit_id;
    /**
     * 制限名前
     */
    private $limit_level_name;
    /**
     * 対象年齢
     */
    private $age;

    /**
     * @return mixed
     */
    public function getAgeLimitId()
    {
        return $this->age_limit_id;
    }

    /**
     * @param mixed $age_limit_id
     */
    public function setAgeLimitId($age_limit_id)
    {
        $this->age_limit_id = $age_limit_id;
    }

    /**
     * @return mixed
     */
    public function getLimitLevelName()
    {
        return $this->limit_level_name;
    }

    /**
     * @param mixed $limit_level_name
     */
    public function setLimitLevelName($limit_level_name)
    {
        $this->limit_level_name = $limit_level_name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


}
?>