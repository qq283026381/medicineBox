<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/17
 * Time: 11:28
 */
require_once '../util/Tools.php';
require_once '../model/UserModel.php';
require_once '../implement/LoginImpl.php';
$tools = new Tools();
$data = $tools->getData();
if ($tools->checkData($data)) {
    $message = (array)json_decode(base64_decode($_COOKIE['mbfor']));
    if (isset($message['id']) && isset($message['name']) && isset($message['code'])) {
        setcookie('mbfor', '', time() - 3600);
        if ($data['code'] !== $message['code']) {
            echo $tools->setData(array('result' => false));
        } else {
            require_once '../implement/LoginImpl.php';
            $operation = new LoginImpl();
            $result = $operation->reviseLoginInfo($message['id'], $message['name'], $data['pwd']);
            if (!$result['result']) {
                $result['result'] = false;
            }
            echo $tools->setData($result);
        }

    } else {
        echo $tools->setData(array('result' => false));
    }
} else {
    echo $tools->setData(array('result' => false));
}