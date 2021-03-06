<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 22:15
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/UrineRoutineModel.php';
        require_once '../implement/UrineRoutineImpl.php';
        $urineRoutine = new UrineRoutineModel($id, $data['LEU'], $data['KET'], $data['URO'], $data['BIL'], $data['SG'], $data['BLD'], $data['PRO'], $data['CLU'], $data['NIT'], $data['PH'], $data['urineRoutineSum']);
        $operation = new UrineRoutineImpl();
        $result = $operation->addUrineRoutine($urineRoutine);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording = new RecordingImpl();
            $recording->updateRecording('urine_routine', $result['number'], $data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}