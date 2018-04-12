<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 16:25
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/ECGModel.php';
        require_once '../implement/ECGImpl.php';
        $ECG = new ECGModel($id, $data['ECG'], $data['ECGSum']);
        $operation = new ECGImpl();
        $result = $operation->reviseECG($ECG, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}