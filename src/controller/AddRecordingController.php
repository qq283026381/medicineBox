<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 14:35
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
        if ($userId != 'false') {
            if (gettype($userId) == 'integer') {
                $recording = new RecordingModel($userId, $data['name'], $data['gender'], $data['time']);
                $operation = new RecordingImpl();
                $result = $operation->addRecording($recording);
                echo $tools->setData($result);
            }
        }
    } else {
        echo $tools->setData(array('result' => false));
    }
}