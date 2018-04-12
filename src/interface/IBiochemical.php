<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 20:58
 */

interface IBiochemical
{
    public function addBiochemical($biochemical);

    public function getBiochemical($biochemicalId, $userId);

    public function reviseBiochemical($biochemical, $biochemicalId);
}