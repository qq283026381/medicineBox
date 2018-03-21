<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 16:16
 */
interface ILogin
{
    public function checkLoginInfo($user);
    public function register($user);
    public function checkUser($name);
}