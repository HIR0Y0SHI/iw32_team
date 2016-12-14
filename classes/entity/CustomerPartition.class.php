<?php
/**
 * 顧客パーティションクラス
 * 
 * @author TAMA
 * @version 1.0
 * Created: 2016/12/12
 */

/***
 * 顧客種別エンティティクラス
 */
class CustomerPartition {
	/**
	 * 顧客パーティションID
	 */
	private $customer_partition_id;
	/**
	 * 種別名
	 */
	private $name;

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


}
?>