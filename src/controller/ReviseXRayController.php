<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 17:06
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/XRayModel.php';
        require_once '../implement/XRayImpl.php';
        $XRay = new XRayModel($id, $data['XRay'], $data['XRaySum']);
        $operation = new XRayImpl();
        $result = $operation->reviseXRay($XRay, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}