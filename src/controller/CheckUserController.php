<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/17
 * Time: 11:07
 */
require_once '../util/Tools.php';
$tools = new Tools();
$data = $tools->getData();
if ($tools->checkData($data)) {
    require_once '../implement/LoginImpl.php';
    $operation = new LoginImpl();
    $check = $operation->checkUser('', $data['phone']);
    if ($check->num_rows > 0) {
        $result['result'] = true;
        $row = $check->fetch_assoc();
        $data = base64_encode(json_encode(array('name' => $row['user_name'], 'id' => $row['user_id'])));
        setcookie('mbfor', $data, time() + 180);
    } else {
        $result['result'] = false;
    }
    echo $tools->setData($result);
} else {
    echo $tools->setData(array('result' => false));
}