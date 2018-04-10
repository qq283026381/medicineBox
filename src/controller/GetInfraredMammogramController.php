<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/9
 * Time: 16:31
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/InfraredMammogramImpl.php';
        $operation = new InfraredMammogramImpl();
        $result = $operation->getInfraredMammogram($data['infraredMammogram'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'leftBreast' => $row['left_breast'],
                    'rightBreast' => $row['right_breast'],
                    'infraredMammogramSum' => $row['infrared_mammogram_sum']
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