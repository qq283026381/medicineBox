<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 21:04
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id=$tools->getUserId();
        require_once '../model/BiochemicalModel.php';
        require_once '../implement/BiochemicalImpl.php';
        $biochemical=new BiochemicalModel(
            $id,
            $data['protein'],
            $data['albumin'],
            $data['globulin'],
            $data['AG'],
            $data['TBIL'],
            $data['DBIL'],
            $data['IBIL'],
            $data['ALT'],
            $data['AST'],
            $data['BUN'],
            $data['CRE'],
            $data['UA'],
            $data['TG'],
            $data['CHO'],
            $data['HDLC'],
            $data['LDLC'],
            $data['GLU'],
            $data['ALP'],
            $data['biochemicalSum']);
        $operation=new BiochemicalImpl();
        $result=$operation->addBiochemical($biochemical);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording = new RecordingImpl();
            $recording->updateRecording('biochemical', $result['number'], $data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}