<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/20
 * Time: 14:51
 */
require_once '../util/Tools.php';
require_once '../implement/DiagnosisImpl.php';
$diagnosis = new DiagnosisImpl();
$tools = new Tools();
$result = $diagnosis->getAllDiagnosis();
$data = [];
$names = [];
$types = [];
$content = [];
while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
    array_push($names, $row['diagnosis_name']);
    array_push($types, $row['diagnosis_type']);
}
$types = array_merge(array_flip(array_flip($types)));
for ($i = 0; $i < sizeof($types); $i++) {
    $item = [];
    for ($j = 0; $j < sizeof($data); $j++) {
        if ($data[$j]['diagnosis_type'] == $types[$i]) {
            array_push($item, $data[$j]['diagnosis_name']);
        }
    }
    $content[$i]['diagnosisType'] = $types[$i];
    $content[$i]['diagnosisName'] = $item;
}
echo $tools->setData($content);
