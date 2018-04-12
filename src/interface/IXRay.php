<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 20:04
 */

interface IXRay
{
    public function addXRay($XRay);

    public function getXRay($XRayId, $userId);

    public function reviseXRay($XRay, $XRayId);
}