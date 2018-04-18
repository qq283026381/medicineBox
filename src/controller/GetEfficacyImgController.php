<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/18
 * Time: 15:45
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $data['id'];
        require_once '../implement/EfficacyImpl.php';
        $operation = new EfficacyImpl();
        $result = $operation->getEfficacyImg($id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = $row['img'];
            } else {
                $result['result'] = false;
            }
        }
        unset($result['source']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}