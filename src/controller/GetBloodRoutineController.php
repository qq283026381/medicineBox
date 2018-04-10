<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/10
 * Time: 13:46
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/BloodRoutineImpl.php';
        $operation = new BloodRoutineImpl();
        $result = $operation->getBloodRoutine($data['bloodRoutine'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'WBC' => $row['WBC'],
                    'RBC' => $row['RBC'],
                    'HGB' => $row['HGB'],
                    'HCT' => $row['HCT'],
                    'PLT' => $row['PLT'],
                    'MCV' => $row['MCV'],
                    'MCH' => $row['MCH'],
                    'MCHC' => $row['MCHC'],
                    'MPV' => $row['MPV'],
                    'PDW' => $row['PDW'],
                    'LY1' => $row['LY%'],
                    'MO1' => $row['MO%'],
                    'GR1' => $row['GR%'],
                    'LY' => $row['LY'],
                    'MO' => $row['MO'],
                    'GR' => $row['GR'],
                    'bloodRoutineSum' => $row['blood_routine_sum']
                );
            } else {
                $result['result'] = false;
            }
            unset($result['source']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}