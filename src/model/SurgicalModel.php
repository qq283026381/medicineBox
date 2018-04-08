<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:05
 */
class SurgicalModel
{
    private $userId;
    private $skin;
    private $thyroid;
    private $lymphNode;
    private $spin;
    private $limbJoint;
    private $surgicalSum;

    /**
     * SurgicalModel constructor.
     * @param $userId
     * @param $skin
     * @param $thyroid
     * @param $lymphNode
     * @param $spin
     * @param $limbJoint
     * @param $surgicalSum
     */
    public function __construct($userId, $skin, $thyroid, $lymphNode, $spin, $limbJoint, $surgicalSum)
    {
        $this->userId = $userId;
        $this->skin = $skin;
        $this->thyroid = $thyroid;
        $this->lymphNode = $lymphNode;
        $this->spin = $spin;
        $this->limbJoint = $limbJoint;
        $this->surgicalSum = $surgicalSum;
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
    public function getSkin()
    {
        return $this->skin;
    }

    /**
     * @param mixed $skin
     */
    public function setSkin($skin)
    {
        $this->skin = $skin;
    }

    /**
     * @return mixed
     */
    public function getThyroid()
    {
        return $this->thyroid;
    }

    /**
     * @param mixed $thyroid
     */
    public function setThyroid($thyroid)
    {
        $this->thyroid = $thyroid;
    }

    /**
     * @return mixed
     */
    public function getLymphNode()
    {
        return $this->lymphNode;
    }

    /**
     * @param mixed $lymphNode
     */
    public function setLymphNode($lymphNode)
    {
        $this->lymphNode = $lymphNode;
    }

    /**
     * @return mixed
     */
    public function getSpin()
    {
        return $this->spin;
    }

    /**
     * @param mixed $spin
     */
    public function setSpin($spin)
    {
        $this->spin = $spin;
    }

    /**
     * @return mixed
     */
    public function getLimbJoint()
    {
        return $this->limbJoint;
    }

    /**
     * @param mixed $limbJoint
     */
    public function setLimbJoint($limbJoint)
    {
        $this->limbJoint = $limbJoint;
    }

    /**
     * @return mixed
     */
    public function getSurgicalSum()
    {
        return $this->surgicalSum;
    }

    /**
     * @param mixed $surgicalSum
     */
    public function setSurgicalSum($surgicalSum)
    {
        $this->surgicalSum = $surgicalSum;
    }

}