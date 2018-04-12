<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 15:30
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority()!=='true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/InternalImpl.php';
        require_once '../model/InternalModel.php';
        $internal = new InternalModel($id, $data['height'], $data['weight'], $data['BMI'], $data['bloodPressure'], $data['heartRate'], $data['heart'], $data['noise'], $data['liver'], $data['spleen'], $data['lung'], $data['internalSum']);
        $operation = new InternalImpl();
        $result = $operation->reviseInternal($internal, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}