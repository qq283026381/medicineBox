<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:13
 */

class BoneDensityModel
{
    private $userId;
    private $boneDensitySum;

    /**
     * BoneDensityModel constructor.
     * @param $userId
     * @param $boneDensitySum
     */
    public function __construct($userId, $boneDensitySum)
    {
        $this->userId = $userId;
        $this->boneDensitySum = $boneDensitySum;
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
    public function getBoneDensitySum()
    {
        return $this->boneDensitySum;
    }

    /**
     * @param mixed $boneDensitySum
     */
    public function setBoneDensitySum($boneDensitySum)
    {
        $this->boneDensitySum = $boneDensitySum;
    }


}