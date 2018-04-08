<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:34
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/InfraredMammogramModel.php';
        require_once '../implement/InfraredMammogramImpl.php';
        $infraredMammogram = new InfraredMammogramModel($id, $data['leftBreast'], $data['rightBreast'], $data['infraredMammogramSum']);
        $operation = new InfraredMammogramImpl();
        $result = $operation->addInfraredMammogram($infraredMammogram);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording = new RecordingImpl();
            $recording->updateRecording('infrared_mammogram', $result['number'], $data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}