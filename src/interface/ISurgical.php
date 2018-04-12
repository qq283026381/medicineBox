<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:23
 */
interface ISurgical
{
    public function addSurgical($surgical);

    public function getSurgical($surgicalId, $userId);

    public function reviseSurgical($surgical, $surgicalId);
}