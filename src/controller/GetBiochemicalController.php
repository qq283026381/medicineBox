<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/10
 * Time: 13:38
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/BiochemicalImpl.php';
        $operation = new BiochemicalImpl();
        $result = $operation->getBiochemical($data['biochemical'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'id' => $row['biochemical_id'],
                    'protein' => $row['protein'],
                    'albumin' => $row['albumin'],
                    'globulin' => $row['globulin'],
                    'AG' => $row['A/G'],
                    'TBIL' => $row['TBIL'],
                    'DBIL' => $row['DBIL'],
                    'IBIL' => $row['IBIL'],
                    'ALT' => $row['ALT'],
                    'AST' => $row['AST'],
                    'BUN' => $row['BUN'],
                    'CRE' => $row['CRE'],
                    'UA' => $row['UA'],
                    'TG' => $row['TG'],
                    'CHO' => $row['CHO'],
                    'HDLC' => $row['HDL-C'],
                    'LDLC' => $row['LDL-C'],
                    'GLU' => $row['GLU'],
                    'ALP' => $row['ALP'],
                    'biochemicalSum' => $row['biochemical_sum']
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