<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/7
 * Time: 15:04
 */
require_once '../util/Tools.php';
require_once '../implement/RecordingImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $userId = $tools->getUserId();
    if ($userId != 'false') {
        if (gettype($userId) == 'integer') {
            $operation = new RecordingImpl();
            $result = $operation->getAllRecordings($userId);
            if ($result->num_rows > 0) {
                $content = [];
                while ($row = $result->fetch_assoc()) {
                    $item = array(
                        'id' => $row['recording_id'],
                        'name' => $row['name'],
                        'gender' => $row['gender'],
                        'time' => $row['time'],
                        'internal' => $row['internal_id'],
                        'surgical' => $row['surgical_id'],
                        'ophthalmology' => $row['ophthalmology_id'],
                        'gynecology' => $row['gynecology_id'],
                        'infrared_mammogram' => $row['infrared_mammogram_id'],
                        'B_scan' => $row['B_scan_id'],
                        'bone_density' => $row['bone_density_id'],
                        'ECG' => $row['ECG_id'],
                        'X_ray' => $row['X_ray_id'],
                        'biochemical' => $row['biochemical_id'],
                        'blood_routine' => $row['blood_routine_id'],
                        'urine_routine' => $row['urine_routine_id']
                    );
                    array_push($content, $item);
                }
                echo $tools->setData($content);
            }
        }
    }
}