<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 19:09
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $userId = $tools->getUserId();
        require_once '../model/InternalModel.php';
        require_once '../implement/InternalImpl.php';
        $internal = new InternalModel($userId, $data['height'], $data['weight'], $data['BMI'], $data['bloodPressure'], $data['heartRate'], $data['heart'], $data['noise'], $data['liver'], $data['spleen'], $data['lung'], $data['internalSum']);
        $operation = new InternalImpl();
        $result = $operation->addInternal($internal);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording = new RecordingImpl();
            $recording->updateInternal($result['number'], $data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}