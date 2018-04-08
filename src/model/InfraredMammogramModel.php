<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:11
 */
class InfraredMammogramModel
{
    private $userId;
    private $leftBreast;
    private $rightBreast;
    private $infraredMammogramSum;

    /**
     * InfraredMammogramModel constructor.
     * @param $userId
     * @param $leftBreast
     * @param $rightBreast
     * @param $infraredMammogramSum
     */
    public function __construct($userId, $leftBreast, $rightBreast, $infraredMammogramSum)
    {
        $this->userId = $userId;
        $this->leftBreast = $leftBreast;
        $this->rightBreast = $rightBreast;
        $this->infraredMammogramSum = $infraredMammogramSum;
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
    public function getLeftBreast()
    {
        return $this->leftBreast;
    }

    /**
     * @param mixed $leftBreast
     */
    public function setLeftBreast($leftBreast)
    {
        $this->leftBreast = $leftBreast;
    }

    /**
     * @return mixed
     */
    public function getRightBreast()
    {
        return $this->rightBreast;
    }

    /**
     * @param mixed $rightBreast
     */
    public function setRightBreast($rightBreast)
    {
        $this->rightBreast = $rightBreast;
    }

    /**
     * @return mixed
     */
    public function getInfraredMammogramSum()
    {
        return $this->infraredMammogramSum;
    }

    /**
     * @param mixed $infraredMammogramSum
     */
    public function setInfraredMammogramSum($infraredMammogramSum)
    {
        $this->infraredMammogramSum = $infraredMammogramSum;
    }

}