<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:08
 */
class OphthalmologyModel
{
    private $userId;
    private $conjunctiva;
    private $fundus;
    private $iris;
    private $cornea;
    private $lens;
    private $ophthalmologySum;

    /**
     * OphthalmologyModel constructor.
     * @param $userId
     * @param $conjunctiva
     * @param $fundus
     * @param $iris
     * @param $cornea
     * @param $lens
     * @param $ophthalmologySum
     */
    public function __construct($userId, $conjunctiva, $fundus, $iris, $cornea, $lens, $ophthalmologySum)
    {
        $this->userId = $userId;
        $this->conjunctiva = $conjunctiva;
        $this->fundus = $fundus;
        $this->iris = $iris;
        $this->cornea = $cornea;
        $this->lens = $lens;
        $this->ophthalmologySum = $ophthalmologySum;
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
    public function getConjunctiva()
    {
        return $this->conjunctiva;
    }

    /**
     * @param mixed $conjunctiva
     */
    public function setConjunctiva($conjunctiva)
    {
        $this->conjunctiva = $conjunctiva;
    }

    /**
     * @return mixed
     */
    public function getFundus()
    {
        return $this->fundus;
    }

    /**
     * @param mixed $fundus
     */
    public function setFundus($fundus)
    {
        $this->fundus = $fundus;
    }

    /**
     * @return mixed
     */
    public function getIris()
    {
        return $this->iris;
    }

    /**
     * @param mixed $iris
     */
    public function setIris($iris)
    {
        $this->iris = $iris;
    }

    /**
     * @return mixed
     */
    public function getCornea()
    {
        return $this->cornea;
    }

    /**
     * @param mixed $cornea
     */
    public function setCornea($cornea)
    {
        $this->cornea = $cornea;
    }

    /**
     * @return mixed
     */
    public function getLens()
    {
        return $this->lens;
    }

    /**
     * @param mixed $lens
     */
    public function setLens($lens)
    {
        $this->lens = $lens;
    }

    /**
     * @return mixed
     */
    public function getOphthalmologySum()
    {
        return $this->ophthalmologySum;
    }

    /**
     * @param mixed $ophthalmologySum
     */
    public function setOphthalmologySum($ophthalmologySum)
    {
        $this->ophthalmologySum = $ophthalmologySum;
    }

}