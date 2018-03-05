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
        $query = 'SELECT * FROM login WHERE login_name=? AND login_pwd=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $user->getUserName(), $user->getUserPwd());
        $stmt->execute();
        return $stmt->get_result();
    }
}