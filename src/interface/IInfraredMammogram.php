<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:22
 */

interface IInfraredMammogram
{
    public function addInfraredMammogram($infraredMammogram);

    public function getInfraredMammogram($infraredMammogramId, $userId);

    public function reviseInfraredMammogram($infraredMammogram, $infraredMammogramId);
}