<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:09
 */

interface IGynecology
{
    public function addGynecology($gynecology);

    public function getGynecology($gynecologyId, $userId);
}