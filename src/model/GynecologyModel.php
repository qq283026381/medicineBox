<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:09
 */
class GynecologyModel{
    private $userId;
    private $vulva;
    private $vaginal;
    private $vaginalSecretion;
    private $cervix;
    private $palace;
    private $leftAttachment;
    private $rightAttachment;
    private $gynecologySum;

    /**
     * GynecologyModel constructor.
     * @param $userId
     * @param $vulva
     * @param $vaginal
     * @param $vaginalSecretion
     * @param $cervix
     * @param $palace
     * @param $leftAttachment
     * @param $rightAttachment
     * @param $gynecologySum
     */
    public function __construct($userId, $vulva, $vaginal, $vaginalSecretion, $cervix, $palace, $leftAttachment, $rightAttachment, $gynecologySum)
    {
        $this->userId = $userId;
        $this->vulva = $vulva;
        $this->vaginal = $vaginal;
        $this->vaginalSecretion = $vaginalSecretion;
        $this->cervix = $cervix;
        $this->palace = $palace;
        $this->leftAttachment = $leftAttachment;
        $this->rightAttachment = $rightAttachment;
        $this->gynecologySum = $gynecologySum;
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
    public function getVulva()
    {
        return $this->vulva;
    }

    /**
     * @param mixed $vulva
     */
    public function setVulva($vulva)
    {
        $this->vulva = $vulva;
    }

    /**
     * @return mixed
     */
    public function getVaginal()
    {
        return $this->vaginal;
    }

    /**
     * @param mixed $vaginal
     */
    public function setVaginal($vaginal)
    {
        $this->vaginal = $vaginal;
    }

    /**
     * @return mixed
     */
    public function getVaginalSecretion()
    {
        return $this->vaginalSecretion;
    }

    /**
     * @param mixed $vaginalSecretion
     */
    public function setVaginalSecretion($vaginalSecretion)
    {
        $this->vaginalSecretion = $vaginalSecretion;
    }

    /**
     * @return mixed
     */
    public function getCervix()
    {
        return $this->cervix;
    }

    /**
     * @param mixed $cervix
     */
    public function setCervix($cervix)
    {
        $this->cervix = $cervix;
    }

    /**
     * @return mixed
     */
    public function getPalace()
    {
        return $this->palace;
    }

    /**
     * @param mixed $palace
     */
    public function setPalace($palace)
    {
        $this->palace = $palace;
    }

    /**
     * @return mixed
     */
    public function getLeftAttachment()
    {
        return $this->leftAttachment;
    }

    /**
     * @param mixed $leftAttachment
     */
    public function setLeftAttachment($leftAttachment)
    {
        $this->leftAttachment = $leftAttachment;
    }

    /**
     * @return mixed
     */
    public function getRightAttachment()
    {
        return $this->rightAttachment;
    }

    /**
     * @param mixed $rightAttachment
     */
    public function setRightAttachment($rightAttachment)
    {
        $this->rightAttachment = $rightAttachment;
    }

    /**
     * @return mixed
     */
    public function getGynecologySum()
    {
        return $this->gynecologySum;
    }

    /**
     * @param mixed $gynecologySum
     */
    public function setGynecologySum($gynecologySum)
    {
        $this->gynecologySum = $gynecologySum;
    }

}