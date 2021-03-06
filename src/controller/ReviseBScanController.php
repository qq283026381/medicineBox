<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 16:17
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/BScanModel.php';
        require_once '../implement/BScanImpl.php';
        $BScan = new BScanModel($id, $data['BScan'], $data['BScanSum']);
        $operation = new BScanImpl();
        $result = $operation->reviseBScan($BScan, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}