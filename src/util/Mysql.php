<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 15:54
 */

class Mysql
{
    static private $servername = 'localhost';
    static private $username = 'root';
    static private $password = '960517';
    static private $dbname = 'medicine_box_system';

    function getConnection()
    {
        $conn = new mysqli($this::$servername, $this::$username, $this::$password, $this::$dbname);
        if ($conn->connect_error) {
            return false;
        } else {
            return $conn;
        }
    }
}