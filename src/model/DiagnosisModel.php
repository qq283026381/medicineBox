<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/20
 * Time: 14:38
 */
class DiagnosisModel
{
    private $diagnosisName;
    private $diagnosisType;

    /**
     * DiagnosisModel constructor.
     * @param $diagnosisName
     * @param $diagnosisType
     */
    public function __construct($diagnosisName, $diagnosisType)
    {
        $this->diagnosisName = $diagnosisName;
        $this->diagnosisType = $diagnosisType;
    }

    /**
     * @return mixed
     */
    public function getDiagnosisName()
    {
        return $this->diagnosisName;
    }

    /**
     * @param mixed $diagnosisName
     */
    public function setDiagnosisName($diagnosisName)
    {
        $this->diagnosisName = $diagnosisName;
    }

    /**
     * @return mixed
     */
    public function getDiagnosisType()
    {
        return $this->diagnosisType;
    }

    /**
     * @param mixed $diagnosisType
     */
    public function setDiagnosisType($diagnosisType)
    {
        $this->diagnosisType = $diagnosisType;
    }


}