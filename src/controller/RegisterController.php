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
$data = $tools->getData();
if ($tools->checkData($data)) {
    $register = new LoginImpl();
    $check = $register->checkUser($data['name']);
    if ($check->num_rows > 0) {
        echo $tools->setData(array('result' => false, 'data' => '用户名已经存在'));
    } else {
        $user = new UserModel($data['name'], $data['pwd'], $data['email'], $data['phone']);
        $result = $register->register($user);
        echo $tools->setData($result);
    }
} else {
    echo $tools->setData(array('result' => false, 'data' => '注册失败'));
}

