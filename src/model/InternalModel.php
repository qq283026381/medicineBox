<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 19:06
 */
class InternalModel
{
    private $userId;
    private $height;
    private $weight;
    private $BMI;
    private $bloodPressure;
    private $heartRate;
    private $heart;
    private $noise;
    private $liver;
    private $spleen;
    private $lung;
    private $internalSum;

    /**
     * InternalModel constructor.
     * @param $userId
     * @param $height
     * @param $weight
     * @param $BMI
     * @param $bloodPressure
     * @param $heartRate
     * @param $heart
     * @param $noise
     * @param $liver
     * @param $spleen
     * @param $lung
     * @param $internalSum
     */
    public function __construct($userId, $height, $weight, $BMI, $bloodPressure, $heartRate, $heart, $noise, $liver, $spleen, $lung, $internalSum)
    {
        $this->userId = $userId;
        $this->height = $height;
        $this->weight = $weight;
        $this->BMI = $BMI;
        $this->bloodPressure = $bloodPressure;
        $this->heartRate = $heartRate;
        $this->heart = $heart;
        $this->noise = $noise;
        $this->liver = $liver;
        $this->spleen = $spleen;
        $this->lung = $lung;
        $this->internalSum = $internalSum;
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
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getBMI()
    {
        return $this->BMI;
    }

    /**
     * @param mixed $BMI
     */
    public function setBMI($BMI)
    {
        $this->BMI = $BMI;
    }

    /**
     * @return mixed
     */
    public function getBloodPressure()
    {
        return $this->bloodPressure;
    }

    /**
     * @param mixed $bloodPressure
     */
    public function setBloodPressure($bloodPressure)
    {
        $this->bloodPressure = $bloodPressure;
    }

    /**
     * @return mixed
     */
    public function getHeartRate()
    {
        return $this->heartRate;
    }

    /**
     * @param mixed $heartRate
     */
    public function setHeartRate($heartRate)
    {
        $this->heartRate = $heartRate;
    }

    /**
     * @return mixed
     */
    public function getHeart()
    {
        return $this->heart;
    }

    /**
     * @param mixed $heart
     */
    public function setHeart($heart)
    {
        $this->heart = $heart;
    }

    /**
     * @return mixed
     */
    public function getNoise()
    {
        return $this->noise;
    }

    /**
     * @param mixed $noise
     */
    public function setNoise($noise)
    {
        $this->noise = $noise;
    }

    /**
     * @return mixed
     */
    public function getLiver()
    {
        return $this->liver;
    }

    /**
     * @param mixed $liver
     */
    public function setLiver($liver)
    {
        $this->liver = $liver;
    }

    /**
     * @return mixed
     */
    public function getSpleen()
    {
        return $this->spleen;
    }

    /**
     * @param mixed $spleen
     */
    public function setSpleen($spleen)
    {
        $this->spleen = $spleen;
    }

    /**
     * @return mixed
     */
    public function getLung()
    {
        return $this->lung;
    }

    /**
     * @param mixed $lung
     */
    public function setLung($lung)
    {
        $this->lung = $lung;
    }

    /**
     * @return mixed
     */
    public function getInternalSum()
    {
        return $this->internalSum;
    }

    /**
     * @param mixed $internalSum
     */
    public function setInternalSum($internalSum)
    {
        $this->internalSum = $internalSum;
    }


}