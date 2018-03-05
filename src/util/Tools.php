<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 15:04
 */
class Tools
{
    function getData()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    function setData($data)
    {
        return json_encode($data);
    }
}