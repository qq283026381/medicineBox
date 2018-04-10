<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/9
 * Time: 11:42
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/InternalImpl.php';
        $operation = new InternalImpl();
        $result = $operation->getInternal($data['internal'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'height' => $row['height'],
                    'weight' => $row['weight'],
                    'BMI' => $row['BMI'],
                    'bloodPressure' => $row['blood_pressure'],
                    'heartRate' => $row['heart_rate'],
                    'heart' => $row['heart'],
                    'noise' => $row['noise'],
                    'liver' => $row['liver'],
                    'spleen' => $row['spleen'],
                    'lung' => $row['lung'],
                    'internalSum' => $row['internal_sum']
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