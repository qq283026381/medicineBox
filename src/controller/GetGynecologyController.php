<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/9
 * Time: 16:17
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/GynecologyImpl.php';
        $operation = new GynecologyImpl();
        $result = $operation->getGynecology($data['gynecology'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'id' => $row['gynecology_id'],
                    'vulva' => $row['vulva'],
                    'vaginal' => $row['vaginal'],
                    'vaginalSecretion' => $row['vaginal_secretion'],
                    'cervix' => $row['cervix'],
                    'palace' => $row['palace'],
                    'leftAttachment' => $row['left_attachment'],
                    'rightAttachment' => $row['right_attachment'],
                    'gynecologySum' => $row['gynecology_sum']
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