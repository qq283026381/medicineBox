<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 16:17
 */
require_once '../util/Mysql.php';
require_once '../model/UserModel.php';
require_once '../interface/ILogin.php';

class LoginImpl implements ILogin
{
    private $mysql;
    private $conn;

    /**
     * LoginImpl constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
        $this->conn = $this->mysql->getConnection();
    }


    public function checkLoginInfo($user)
    {
        $query = 'SELECT * FROM user WHERE user_name=? AND user_pwd=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $user->getUserName(), $user->getUserPwd());
        $stmt->execute();
        return $stmt->get_result();
    }

    public function register($user)
    {
        $query = 'INSERT INTO user (user_name,user_pwd,user_email,user_phone) VALUES (?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssss', $user->getUserName(), $user->getUserPwd(), $user->getUserEmail(), $user->getUserPhone());
        return $stmt->execute();
    }

    public function checkUser($name)
    {
        $query = 'SELECT user_id FROM user WHERE user_name=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        return $stmt->get_result();
    }
}