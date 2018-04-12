<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 19:09
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
        $result = $operation->reviseGynecology($gynecology, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}