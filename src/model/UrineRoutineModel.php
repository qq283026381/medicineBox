<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:21
 */

class UrineRoutineModel
{
    private $userId;
    private $LEU;
    PRIVATE $KET;
    PRIVATE $URO;
    PRIVATE $BIL;
    PRIVATE $SG;
    PRIVATE $BLD;
    PRIVATE $PRO;
    PRIVATE $CLU;
    PRIVATE $NIT;
    PRIVATE $PH;
    PRIVATE $urineRoutineSum;

    /**
     * UrineRoutineModel constructor.
     * @param $userId
     * @param $LEU
     * @param $KET
     * @param $URO
     * @param $BIL
     * @param $SG
     * @param $BLD
     * @param $PRO
     * @param $CLU
     * @param $NIT
     * @param $PH
     * @param $urineRoutineSum
     */
    public function __construct($userId, $LEU, $KET, $URO, $BIL, $SG, $BLD, $PRO, $CLU, $NIT, $PH, $urineRoutineSum)
    {
        $this->userId = $userId;
        $this->LEU = $LEU;
        $this->KET = $KET;
        $this->URO = $URO;
        $this->BIL = $BIL;
        $this->SG = $SG;
        $this->BLD = $BLD;
        $this->PRO = $PRO;
        $this->CLU = $CLU;
        $this->NIT = $NIT;
        $this->PH = $PH;
        $this->urineRoutineSum = $urineRoutineSum;
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
    public function getLEU()
    {
        return $this->LEU;
    }

    /**
     * @param mixed $LEU
     */
    public function setLEU($LEU)
    {
        $this->LEU = $LEU;
    }

    /**
     * @return mixed
     */
    public function getKET()
    {
        return $this->KET;
    }

    /**
     * @param mixed $KET
     */
    public function setKET($KET)
    {
        $this->KET = $KET;
    }

    /**
     * @return mixed
     */
    public function getURO()
    {
        return $this->URO;
    }

    /**
     * @param mixed $URO
     */
    public function setURO($URO)
    {
        $this->URO = $URO;
    }

    /**
     * @return mixed
     */
    public function getBIL()
    {
        return $this->BIL;
    }

    /**
     * @param mixed $BIL
     */
    public function setBIL($BIL)
    {
        $this->BIL = $BIL;
    }

    /**
     * @return mixed
     */
    public function getSG()
    {
        return $this->SG;
    }

    /**
     * @param mixed $SG
     */
    public function setSG($SG)
    {
        $this->SG = $SG;
    }

    /**
     * @return mixed
     */
    public function getBLD()
    {
        return $this->BLD;
    }

    /**
     * @param mixed $BLD
     */
    public function setBID($BLD)
    {
        $this->BLD = $BLD;
    }

    /**
     * @return mixed
     */
    public function getPRO()
    {
        return $this->PRO;
    }

    /**
     * @param mixed $PRO
     */
    public function setPRO($PRO)
    {
        $this->PRO = $PRO;
    }

    /**
     * @return mixed
     */
    public function getCLU()
    {
        return $this->CLU;
    }

    /**
     * @param mixed $CLU
     */
    public function setCLU($CLU)
    {
        $this->CLU = $CLU;
    }

    /**
     * @return mixed
     */
    public function getNIT()
    {
        return $this->NIT;
    }

    /**
     * @param mixed $NIT
     */
    public function setNIT($NIT)
    {
        $this->NIT = $NIT;
    }

    /**
     * @return mixed
     */
    public function getPH()
    {
        return $this->PH;
    }

    /**
     * @param mixed $PH
     */
    public function setPH($PH)
    {
        $this->PH = $PH;
    }

    /**
     * @return mixed
     */
    public function getUrineRoutineSum()
    {
        return $this->urineRoutineSum;
    }

    /**
     * @param mixed $urineRoutineSum
     */
    public function setUrineRoutineSum($urineRoutineSum)
    {
        $this->urineRoutineSum = $urineRoutineSum;
    }

}