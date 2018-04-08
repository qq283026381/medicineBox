<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:18
 */

class BloodRoutineModel
{
    private $userId;
    private $WBC;
    private $RBC;
    private $HGB;
    PRIVATE $HCT;
    PRIVATE $PLT;
    PRIVATE $MCV;
    PRIVATE $MCH;
    PRIVATE $MCHC;
    PRIVATE $MPV;
    PRIVATE $PDW;
    PRIVATE $LY1;
    PRIVATE $MO1;
    PRIVATE $GR1;
    PRIVATE $LY;
    PRIVATE $MO;
    PRIVATE $GR;
    PRIVATE $bloodRoutineSum;

    /**
     * BloodRoutineModel constructor.
     * @param $userId
     * @param $WBC
     * @param $RBC
     * @param $HGB
     * @param $HCT
     * @param $PLT
     * @param $MCV
     * @param $MCH
     * @param $MCHC
     * @param $MPV
     * @param $PDW
     * @param $LY1
     * @param $MO1
     * @param $GR1
     * @param $LY
     * @param $MO
     * @param $GR
     * @param $bloodRoutineSum
     */
    public function __construct($userId, $WBC, $RBC, $HGB, $HCT, $PLT, $MCV, $MCH, $MCHC, $MPV, $PDW, $LY1, $MO1, $GR1, $LY, $MO, $GR, $bloodRoutineSum)
    {
        $this->userId = $userId;
        $this->WBC = $WBC;
        $this->RBC = $RBC;
        $this->HGB = $HGB;
        $this->HCT = $HCT;
        $this->PLT = $PLT;
        $this->MCV = $MCV;
        $this->MCH = $MCH;
        $this->MCHC = $MCHC;
        $this->MPV = $MPV;
        $this->PDW = $PDW;
        $this->LY1 = $LY1;
        $this->MO1 = $MO1;
        $this->GR1 = $GR1;
        $this->LY = $LY;
        $this->MO = $MO;
        $this->GR = $GR;
        $this->bloodRoutineSum = $bloodRoutineSum;
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
    public function getWBC()
    {
        return $this->WBC;
    }

    /**
     * @param mixed $WBC
     */
    public function setWBC($WBC)
    {
        $this->WBC = $WBC;
    }

    /**
     * @return mixed
     */
    public function getRBC()
    {
        return $this->RBC;
    }

    /**
     * @param mixed $RBC
     */
    public function setRBC($RBC)
    {
        $this->RBC = $RBC;
    }

    /**
     * @return mixed
     */
    public function getHGB()
    {
        return $this->HGB;
    }

    /**
     * @param mixed $HGB
     */
    public function setHGB($HGB)
    {
        $this->HGB = $HGB;
    }

    /**
     * @return mixed
     */
    public function getHCT()
    {
        return $this->HCT;
    }

    /**
     * @param mixed $HCT
     */
    public function setHCT($HCT)
    {
        $this->HCT = $HCT;
    }

    /**
     * @return mixed
     */
    public function getPLT()
    {
        return $this->PLT;
    }

    /**
     * @param mixed $PLT
     */
    public function setPLT($PLT)
    {
        $this->PLT = $PLT;
    }

    /**
     * @return mixed
     */
    public function getMCV()
    {
        return $this->MCV;
    }

    /**
     * @param mixed $MCV
     */
    public function setMCV($MCV)
    {
        $this->MCV = $MCV;
    }

    /**
     * @return mixed
     */
    public function getMCH()
    {
        return $this->MCH;
    }

    /**
     * @param mixed $MCH
     */
    public function setMCH($MCH)
    {
        $this->MCH = $MCH;
    }

    /**
     * @return mixed
     */
    public function getMCHC()
    {
        return $this->MCHC;
    }

    /**
     * @param mixed $MCHC
     */
    public function setMCHC($MCHC)
    {
        $this->MCHC = $MCHC;
    }

    /**
     * @return mixed
     */
    public function getMPV()
    {
        return $this->MPV;
    }

    /**
     * @param mixed $MPV
     */
    public function setMPV($MPV)
    {
        $this->MPV = $MPV;
    }

    /**
     * @return mixed
     */
    public function getPDW()
    {
        return $this->PDW;
    }

    /**
     * @param mixed $PDW
     */
    public function setPDW($PDW)
    {
        $this->PDW = $PDW;
    }

    /**
     * @return mixed
     */
    public function getLY1()
    {
        return $this->LY1;
    }

    /**
     * @param mixed $LY1
     */
    public function setLY1($LY1)
    {
        $this->LY1 = $LY1;
    }

    /**
     * @return mixed
     */
    public function getMO1()
    {
        return $this->MO1;
    }

    /**
     * @param mixed $MO1
     */
    public function setMO1($MO1)
    {
        $this->MO1 = $MO1;
    }

    /**
     * @return mixed
     */
    public function getGR1()
    {
        return $this->GR1;
    }

    /**
     * @param mixed $GR1
     */
    public function setGR1($GR1)
    {
        $this->GR1 = $GR1;
    }

    /**
     * @return mixed
     */
    public function getLY()
    {
        return $this->LY;
    }

    /**
     * @param mixed $LY
     */
    public function setLY($LY)
    {
        $this->LY = $LY;
    }

    /**
     * @return mixed
     */
    public function getMO()
    {
        return $this->MO;
    }

    /**
     * @param mixed $MO
     */
    public function setMO($MO)
    {
        $this->MO = $MO;
    }

    /**
     * @return mixed
     */
    public function getGR()
    {
        return $this->GR;
    }

    /**
     * @param mixed $GR
     */
    public function setGR($GR)
    {
        $this->GR = $GR;
    }

    /**
     * @return mixed
     */
    public function getBloodRoutineSum()
    {
        return $this->bloodRoutineSum;
    }

    /**
     * @param mixed $bloodRoutineSum
     */
    public function setBloodRoutineSum($bloodRoutineSum)
    {
        $this->bloodRoutineSum = $bloodRoutineSum;
    }

}