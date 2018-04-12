<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 15:56
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/OphthalmologyModel.php';
        require_once '../implement/OphthalmologyImpl.php';
        $ophthalmology = new OphthalmologyModel($id, $data['conjunctiva'], $data['fundus'], $data['iris'], $data['cornea'], $data['lens'], $data['ophthalmologySum']);
        $operation = new OphthalmologyImpl();
        $result = $operation->reviseOphthalmology($ophthalmology, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}