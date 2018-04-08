<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/8
 * Time: 16:14
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/GynecologyModel.php';
        require_once '../implement/GynecologyImpl.php';
        $gynecology = new GynecologyModel($id, $data['vulva'], $data['vaginal'], $data['vaginalSecretion'], $data['cervix'], $data['palace'], $data['leftAttachment'], $data['rightAttachment'], $data['gynecologySum']);
        $operation = new GynecologyImpl();
        $result = $operation->addGynecology($gynecology);
        if ($result['result']) {
            require_once '../implement/RecordingImpl.php';
            $recording=new RecordingImpl();
            $recording->updateRecording('gynecology',$result['number'],$data['recordingId']);
        }
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}