<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/9
 * Time: 12:29
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/SurgicalImpl.php';
        $operation = new SurgicalImpl();
        $result = $operation->getSurgical($data['surgical'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'skin' => $row['skin'],
                    'thyroid' => $row['thyroid'],
                    'lymphNode' => $row['lymph_node'],
                    'spin' => $row['spin'],
                    'limbJoint' => $row['limb_joint'],
                    'surgicalSum' => $row['surgical_sum']
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