<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 21:47
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/BloodRoutineModel.php';
        require_once '../implement/BloodRoutineImpl.php';
        $bloodRoutine = new BloodRoutineModel($id, $data['WBC'], $data['RBC'], $data['HGB'], $data['HCT'], $data['PLT'], $data['MCV'], $data['MCH'], $data['MCHC'], $data['MPV'], $data['PDW'], $data['LY1'], $data['MO1'], $data['GR1'], $data['LY'], $data['MO'], $data['GR'], $data['bloodRoutineSum']);
        $operation = new BloodRoutineImpl();
        $result = $operation->addBloodRoutine($bloodRoutine);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording = new RecordingImpl();
            $recording->updateRecording('blood_routine', $result['number'], $data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}