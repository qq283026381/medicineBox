<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/10
 * Time: 13:56
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/UrineRoutineImpl.php';
        $operation = new UrineRoutineImpl();
        $result = $operation->getUrineRoutine($data['urineRoutine'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'id' => $row['urine_routine_id'],
                    'LEU' => $row['LEU'],
                    'KET' => $row['KET'],
                    'URO' => $row['URO'],
                    'BIL' => $row['BIL'],
                    'SG' => $row['SG'],
                    'BLD' => $row['BLD'],
                    'PRO' => $row['PRO'],
                    'CLU' => $row['CLU'],
                    'NIT' => $row['NIT'],
                    'PH' => $row['PH'],
                    'urineRoutineSum' => $row['urine_routine_sum']
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