<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 16:17
 */
require_once '../util/Mysql.php';
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
        $result = $stmt->get_result();
        $this->mysql->closeConnection();
        return $result;
    }

    public function register($user)
    {
        $query = 'INSERT INTO user (user_name, user_pwd, user_email, user_phone) VALUES (?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssss', $user->getUserName(), $user->getUserPwd(), $user->getUserEmail(), $user->getUserPhone());
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }

    public function checkUser($name, $phone)
    {
        $query = 'SELECT * FROM user WHERE user_name=? OR user_phone=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $name, $phone);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->mysql->closeConnection();
        return $result;
    }

    public function reviseLoginInfo($id, $name, $password)
    {
        $query = 'UPDATE user SET user_pwd=? WHERE user_id=? AND user_name=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sis', $password, $id, $name);
        $result = $stmt->execute();
        $this->mysql->closeConnection();
        return array('result' => $result);
    }
}