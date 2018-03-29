<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/29
 * Time: 15:47
 */
require_once '../util/Tools.php';
require_once '../model/MedicineModel.php';
require_once '../implement/MedicineImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    $name = $data['name'];
    $productionDate = $data['productionDate'];
    $validity = $data['validity'];
    $time = $data['time'];
    $number = $data['number'];
    $id = $data['id'];

    $date = explode('-', $productionDate);
    $date[1] += $validity;
    if ($date[1] > 12) {
        $date[0] += intval($date[1] / 12);
        $date[1] %= 12;
        if ($date[1] > 0 && $date[1] < 10) {
            $date[1] = '0' . $date[1];
        }
    }
    $deadline = implode('-', $date);
    $time = implode(';', $time);
    $medicine = new MedicineModel($id, 1, $name, $productionDate, $validity, $deadline, $time, $number);
    $operation = new MedicineImpl();
    $result = $operation->updateMedicine($medicine);
    echo $tools->setData($result);
}