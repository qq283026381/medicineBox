<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:39
 */
interface IBScan
{
    public function addBScan($BScan);

    public function getBScan($BScanId, $userId);

    public function reviseBScan($BScan, $BScanId);
}