<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:56
 */

interface IOphthalmology
{
    public function addOphthalmology($ophthalmology);

    public function getOphthalmology($ophthalmologyId, $userId);
}