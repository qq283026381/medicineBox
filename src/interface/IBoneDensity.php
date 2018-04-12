<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:56
 */

interface IBoneDensity
{
    public function addBoneDensity($boneDensity);

    public function getBoneDensity($boneDensityId, $userId);

    public function reviseBoneDensity($boneDensity, $boneDensityId);
}