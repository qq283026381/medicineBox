<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/20
 * Time: 14:45
 */
interface IDiagnosis
{
    public function getAllDiagnosis();

    public function getProbability($diagnosis);

    public function getDiseaseProbability($diseaseId);
}