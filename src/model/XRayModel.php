<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:15
 */

class XRayModel
{
    private $userId;
    private $XRay;
    private $XRaySum;

    /**
     * XRayModel constructor.
     * @param $userId
     * @param $XRay
     * @param $XRaySum
     */
    public function __construct($userId, $XRay, $XRaySum)
    {
        $this->userId = $userId;
        $this->XRay = $XRay;
        $this->XRaySum = $XRaySum;
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
    public function getXRay()
    {
        return $this->XRay;
    }

    /**
     * @param mixed $XRay
     */
    public function setXRay($XRay)
    {
        $this->XRay = $XRay;
    }

    /**
     * @return mixed
     */
    public function getXRaySum()
    {
        return $this->XRaySum;
    }

    /**
     * @param mixed $XRaySum
     */
    public function setXRaySum($XRaySum)
    {
        $this->XRaySum = $XRaySum;
    }

}