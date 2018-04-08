<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:14
 */

class ECGModel
{
    private $userId;
    private $ECG;
    private $ECGSum;

    /**
     * ECGModel constructor.
     * @param $userId
     * @param $ECG
     * @param $ECGSum
     */
    public function __construct($userId, $ECG, $ECGSum)
    {
        $this->userId = $userId;
        $this->ECG = $ECG;
        $this->ECGSum = $ECGSum;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getECG()
    {
        return $this->ECG;
    }

    /**
     * @param mixed $ECG
     */
    public function setECG($ECG)
    {
        $this->ECG = $ECG;
    }

    /**
     * @return mixed
     */
    public function getECGSum()
    {
        return $this->ECGSum;
    }

    /**
     * @param mixed $ECGSum
     */
    public function setECGSum($ECGSum)
    {
        $this->ECGSum = $ECGSum;
    }

}