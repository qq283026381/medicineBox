<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:15
 */

class BiochemicalModel
{
    private $userId;
    private $protein;
    private $albumin;
    private $globulin;
    private $AG;
    private $TBIL;
    private $DBIL;
    private $IBIL;
    private $ALT;
    private $AST;
    private $BUN;
    private $CRE;
    private $UA;
    private $TG;
    private $CHO;
    private $HDLC;
    private $LDLC;
    private $GLU;
    private $ALP;
    private $biochemicalSum;

    /**
     * BiochemicalModel constructor.
     * @param $userId
     * @param $protein
     * @param $albumin
     * @param $globulin
     * @param $AG
     * @param $TBIL
     * @param $DBIL
     * @param $IBIL
     * @param $ALT
     * @param $AST
     * @param $BUN
     * @param $CRE
     * @param $UA
     * @param $TG
     * @param $CHO
     * @param $HDLC
     * @param $LDLC
     * @param $GLU
     * @param $ALP
     * @param $biochemicalSum
     */
    public function __construct($userId, $protein, $albumin, $globulin, $AG, $TBIL, $DBIL, $IBIL, $ALT, $AST, $BUN, $CRE, $UA, $TG, $CHO, $HDLC, $LDLC, $GLU, $ALP, $biochemicalSum)
    {
        $this->userId = $userId;
        $this->protein = $protein;
        $this->albumin = $albumin;
        $this->globulin = $globulin;
        $this->AG = $AG;
        $this->TBIL = $TBIL;
        $this->DBIL = $DBIL;
        $this->IBIL = $IBIL;
        $this->ALT = $ALT;
        $this->AST = $AST;
        $this->BUN = $BUN;
        $this->CRE = $CRE;
        $this->UA = $UA;
        $this->TG = $TG;
        $this->CHO = $CHO;
        $this->HDLC = $HDLC;
        $this->LDLC = $LDLC;
        $this->GLU = $GLU;
        $this->ALP = $ALP;
        $this->biochemicalSum = $biochemicalSum;
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
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * @param mixed $protein
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
    }

    /**
     * @return mixed
     */
    public function getAlbumin()
    {
        return $this->albumin;
    }

    /**
     * @param mixed $albumin
     */
    public function setAlbumin($albumin)
    {
        $this->albumin = $albumin;
    }

    /**
     * @return mixed
     */
    public function getGlobulin()
    {
        return $this->globulin;
    }

    /**
     * @param mixed $globulin
     */
    public function setGlobulin($globulin)
    {
        $this->globulin = $globulin;
    }

    /**
     * @return mixed
     */
    public function getAG()
    {
        return $this->AG;
    }

    /**
     * @param mixed $AG
     */
    public function setAG($AG)
    {
        $this->AG = $AG;
    }

    /**
     * @return mixed
     */
    public function getTBIL()
    {
        return $this->TBIL;
    }

    /**
     * @param mixed $TBIL
     */
    public function setTBIL($TBIL)
    {
        $this->TBIL = $TBIL;
    }

    /**
     * @return mixed
     */
    public function getDBIL()
    {
        return $this->DBIL;
    }

    /**
     * @param mixed $DBIL
     */
    public function setDBIL($DBIL)
    {
        $this->DBIL = $DBIL;
    }

    /**
     * @return mixed
     */
    public function getIBIL()
    {
        return $this->IBIL;
    }

    /**
     * @param mixed $IBIL
     */
    public function setIBIL($IBIL)
    {
        $this->IBIL = $IBIL;
    }

    /**
     * @return mixed
     */
    public function getALT()
    {
        return $this->ALT;
    }

    /**
     * @param mixed $ALT
     */
    public function setALT($ALT)
    {
        $this->ALT = $ALT;
    }

    /**
     * @return mixed
     */
    public function getAST()
    {
        return $this->AST;
    }

    /**
     * @param mixed $AST
     */
    public function setAST($AST)
    {
        $this->AST = $AST;
    }

    /**
     * @return mixed
     */
    public function getBUN()
    {
        return $this->BUN;
    }

    /**
     * @param mixed $BUN
     */
    public function setBUN($BUN)
    {
        $this->BUN = $BUN;
    }

    /**
     * @return mixed
     */
    public function getCRE()
    {
        return $this->CRE;
    }

    /**
     * @param mixed $CRE
     */
    public function setCRE($CRE)
    {
        $this->CRE = $CRE;
    }

    /**
     * @return mixed
     */
    public function getUA()
    {
        return $this->UA;
    }

    /**
     * @param mixed $UA
     */
    public function setUA($UA)
    {
        $this->UA = $UA;
    }

    /**
     * @return mixed
     */
    public function getTG()
    {
        return $this->TG;
    }

    /**
     * @param mixed $TG
     */
    public function setTG($TG)
    {
        $this->TG = $TG;
    }

    /**
     * @return mixed
     */
    public function getCHO()
    {
        return $this->CHO;
    }

    /**
     * @param mixed $CHO
     */
    public function setCHO($CHO)
    {
        $this->CHO = $CHO;
    }

    /**
     * @return mixed
     */
    public function getHDLC()
    {
        return $this->HDLC;
    }

    /**
     * @param mixed $HDLC
     */
    public function setHDLC($HDLC)
    {
        $this->HDLC = $HDLC;
    }

    /**
     * @return mixed
     */
    public function getLDLC()
    {
        return $this->LDLC;
    }

    /**
     * @param mixed $LDLC
     */
    public function setLDLC($LDLC)
    {
        $this->LDLC = $LDLC;
    }

    /**
     * @return mixed
     */
    public function getGLU()
    {
        return $this->GLU;
    }

    /**
     * @param mixed $GLU
     */
    public function setGLU($GLU)
    {
        $this->GLU = $GLU;
    }

    /**
     * @return mixed
     */
    public function getALP()
    {
        return $this->ALP;
    }

    /**
     * @param mixed $ALP
     */
    public function setALP($ALP)
    {
        $this->ALP = $ALP;
    }

    /**
     * @return mixed
     */
    public function getBiochemicalSum()
    {
        return $this->biochemicalSum;
    }

    /**
     * @param mixed $biochemicalSum
     */
    public function setBiochemicalSum($biochemicalSum)
    {
        $this->biochemicalSum = $biochemicalSum;
    }

}