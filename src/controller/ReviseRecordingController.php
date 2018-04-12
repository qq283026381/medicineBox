<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 18:53
 */
require_once '../util/Tools.php';
require_once '../model/RecordingModel.php';
require_once '../implement/RecordingImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $userId = $tools->getUserId();
        $recording = new RecordingModel($userId, $data['name'], $data['gender'], $data['time']);
        $operation = new RecordingImpl();
        $result = $operation->reviseRecording($recording, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}