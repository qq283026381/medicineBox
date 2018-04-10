<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/10
 * Time: 15:24
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/RecordingImpl.php';
        $operation = new RecordingImpl();
        $result = $operation->deleteRecording($data['id'], $id);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}