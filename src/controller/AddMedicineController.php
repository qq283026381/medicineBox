<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/27
 * Time: 14:05
 */
require_once '../util/Tools.php';
require_once '../model/MedicineModel.php';
require_once '../implement/MedicineImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $userId = $tools->getUserId();
    if ($userId != 'false' && gettype($userId) == 'integer') {
        $data = $tools->getData();
        $name = $data['name'];
        $productionDate = $data['productionDate'];
        $validity = $data['validity'];
        $time = $data['time'];
        $number = $data['number'];
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
        $medicine = new MedicineModel('', $userId, $name, $productionDate, $validity, $deadline, $time, $number);
        $operation = new MedicineImpl();
        $result = $operation->addMedicine($medicine);
        echo $tools->setData($result);
    }
}