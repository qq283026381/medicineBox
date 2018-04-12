<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 15:47
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
        $result = $operation->reviseSurgical($surgical, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}