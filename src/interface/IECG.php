<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 19:55
 */

interface IECG
{
    public function addECG($ECG);

    public function getECG($ECGId, $userId);

    public function reviseECG($ECG, $ECGId);
}