<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/29
 * Time: 16:53
 */
require_once '../util/Tools.php';
require_once '../implement/MedicineImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $userId = $tools->getUserId();
        if ($userId != 'false') {
            if (gettype($userId) == 'integer') {
                $medicineId = $data['id'];
                $operation = new MedicineImpl();
                $result = $operation->deleteMedicine($userId, $medicineId);
                echo $tools->setData($result);
            }
        }
    } else {
        echo $tools->setData(array('result' => false));
    }
}