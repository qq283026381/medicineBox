<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 14:27
 */
class RecordingModel
{
    private $userId;
    private $name;
    private $gender;
    private $time;

    /**
     * RecordingModel constructor.
     * @param $userId
     * @param $name
     * @param $gender
     * @param $time
     */
    public function __construct($userId, $name, $gender, $time)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->gender = $gender;
        $this->time = $time;
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

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

}