<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/9
 * Time: 13:39
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../implement/OphthalmologyImpl.php';
        $operation = new OphthalmologyImpl();
        $result = $operation->getOphthalmology($data['ophthalmology'], $id);
        if ($result['result']) {
            if ($result['source']->num_rows > 0) {
                $row = $result['source']->fetch_assoc();
                $result['data'] = array(
                    'conjunctiva' => $row['conjunctiva'],
                    'fundus' => $row['fundus'],
                    'iris' => $row['iris'],
                    'cornea' => $row['cornea'],
                    'lens' => $row['lens'],
                    'ophthalmologySum' => $row['ophthalmology_sum']
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