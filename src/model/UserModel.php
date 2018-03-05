<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 16:03
 */
class UserModel
{
    private $userName;
    private $userPwd;
    private $userEmail;
    private $userPhone;

    /**
     * UserModel constructor.
     * @param $userName
     * @param $userPwd
     * @param $userEmail
     * @param $userPhone
     */
    public function __construct($userName, $userPwd, $userEmail, $userPhone)
    {
        $this->userName = $userName;
        $this->userPwd = $userPwd;
        $this->userEmail = $userEmail;
        $this->userPhone = $userPhone;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserPwd()
    {
        return $this->userPwd;
    }

    /**
     * @param mixed $userPwd
     */
    public function setUserPwd($userPwd)
    {
        $this->userPwd = $userPwd;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserPhone()
    {
        return $this->userPhone;
    }

    /**
     * @param mixed $userPhone
     */
    public function setUserPhone($userPhone)
    {
        $this->userPhone = $userPhone;
    }

}