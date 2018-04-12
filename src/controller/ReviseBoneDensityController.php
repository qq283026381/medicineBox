<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/12
 * Time: 16:21
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    if ($tools->checkData($data)) {
        $id = $tools->getUserId();
        require_once '../model/BoneDensityModel.php';
        require_once '../implement/BoneDensityImpl.php';
        $boneDensity = new BoneDensityModel($id, $data['boneDensitySum']);
        $operation = new BoneDensityImpl();
        $result = $operation->reviseBoneDensity($boneDensity, $data['id']);
        echo $tools->setData($result);
    } else {
        echo $tools->setData(array('result' => false));
    }
}