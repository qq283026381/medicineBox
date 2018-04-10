<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/10
 * Time: 13:33
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/XRayImpl.php';
        $operation = new XRayImpl();
        $result = $operation->getXRay($data['XRay'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'XRay' => $row['X_ray'],
                    'XRaySum' => $row['X_ray_sum']
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