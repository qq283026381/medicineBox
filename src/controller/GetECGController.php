<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/10
 * Time: 13:28
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/ECGImpl.php';
        $operation = new ECGImpl();
        $result = $operation->getECG($data['ECG'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'ECG' => $row['ECG'],
                    'ECGSum' => $row['ECG_sum']
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