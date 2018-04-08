<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:13
 */

class BScanModel
{
    private $userId;
    private $BScan;
    private $BScanSum;

    /**
     * BScanModel constructor.
     * @param $userId
     * @param $BScan
     * @param $BScanSum
     */
    public function __construct($userId, $BScan, $BScanSum)
    {
        $this->userId = $userId;
        $this->BScan = $BScan;
        $this->BScanSum = $BScanSum;
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
    public function getBScan()
    {
        return $this->BScan;
    }

    /**
     * @param mixed $BScan
     */
    public function setBScan($BScan)
    {
        $this->BScan = $BScan;
    }

    /**
     * @return mixed
     */
    public function getBScanSum()
    {
        return $this->BScanSum;
    }

    /**
     * @param mixed $BScanSum
     */
    public function setBScanSum($BScanSum)
    {
        $this->BScanSum = $BScanSum;
    }

}