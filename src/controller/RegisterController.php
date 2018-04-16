<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/21
 * Time: 15:36
 */
require_once '../util/Tools.php';
require_once '../model/UserModel.php';
require_once '../implement/LoginImpl.php';
$tools = new Tools();
$message = (array)json_decode(base64_decode($_COOKIE['mbsco']));
if ($message['uid'] === 'new' && isset($message['code'])) {
    $code = $message['code'];
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        if ($code == $data['code']) {
            $register = new LoginImpl();
            $check = $register->checkUser($data['name']);
            if ($check->num_rows > 0) {
                setcookie('mbsco', '', time() - 3600);
                echo $tools->setData(array('result' => false, 'data' => '用户名已经存在'));
            } else {
                $user = new UserModel($data['name'], $data['pwd'], $data['email'], $data['phone']);
                $register = new LoginImpl();
                $result = $register->register($user);
                if ($result['result']) {
                    setcookie('mbsco', '', time() - 3600);
                }
                echo $tools->setData($result);
            }
        } else {
            echo $tools->setData(array('result' => false, 'data' => '验证码有误'));
        }
    } else {
        echo $tools->setData(array('result' => false, 'data' => '注册失败'));
    }
}


