<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/27
 * Time: 14:49
 */
require_once '../util/Tools.php';
require_once '../model/MedicineModel.php';
require_once '../model/UserModel.php';
require_once '../implement/MedicineImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $userId = $tools->getUserId();
    if ($userId != 'false' && gettype($userId) == 'integer') {
        $operation = new MedicineImpl();
        $result = $operation->getAllMedicine($userId);
        if ($result->num_rows > 0) {
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                $medicine[$index++] = array('id' => $row['medicine_id'], 'name' => $row['medicine_name'], 'productionDate' => $row['medicine_production_date'], 'validity' => $row['medicine_validity'], 'deadline' => $row['medicine_deadline'], 'time' => explode(';', $row['medicine_time']), 'number' => (int)$row['medicine_number']);
            }
            echo $tools->setData($medicine);
        } else {
            echo 'result:error';
        }
    }
}