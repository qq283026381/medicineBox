<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 15:29
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/SurgicalModel.php';
        require_once '../implement/SurgicalImpl.php';
        $surgical = new SurgicalModel($id, $data['skin'], $data['thyroid'], $data['lymphNode'], $data['spin'], $data['limbJoint'], $data['surgicalSum']);
        $operation = new SurgicalImpl();
        $result = $operation->addSurgical($surgical);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording = new RecordingImpl();
            $recording->updateRecording('surgical', $result['number'], $data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}