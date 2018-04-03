<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/30
 * Time: 12:48
 */
require_once '../util/Tools.php';
require_once '../model/DiagnosisModel.php';
require_once '../implement/DiagnosisImpl.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $data = $tools->getData();
    $diagnosis = new DiagnosisImpl();
    $diseaseId = [];  //存放每个症状概率对应的疾病id
    $number = [];     //存放每个症状概率
    $sum = [];        //每种疾病的症状累乘结果
    $name = [];       //每种疾病的名称
    $content['status'] = 1;
    /***
     * 获取疾病id和症状概率
     */
    for ($i = 0; $i < sizeof($data); $i++) {
        $diagnosisModel[$i] = new DiagnosisModel($data[$i]['name'], $data[$i]['type']);
        $diagnosisResult[$i] = $diagnosis->getProbability($diagnosisModel[$i]);
        //对每个症状进行概率查询
        if ($diagnosisResult[$i]->num_rows > 0) {
            while ($row = $diagnosisResult[$i]->fetch_assoc()) {
                array_push($diseaseId, $row['disease_id']);
                array_push($number, $row['diagnosis_probability']);
            }
        } else {
            $content['status'] = 0;
            echo $tools->setData($content);
            die();
        }
    }
    $probability['disease'] = $diseaseId;
    $probability['number'] = $number;
    $diseaseType = array_merge(array_flip(array_flip($probability['disease'])));
    //对疾病id进行去重
    /***
     * 计算症状概率累乘结果
     */
    for ($i = 0; $i < sizeof($diseaseType); $i++) {
        $sum[$diseaseType[$i]] = 1;
        for ($j = 0; $j < sizeof($probability['disease']); $j++) {
            $item = $probability['disease'][$j];
            if ($item == $diseaseType[$i]) {
                $sum[$diseaseType[$i]] *= $probability['number'][$j];
            }
        }
    }
    $probability['sum'] = $sum;
    $probabilitySum = 0;    //所有疾病概率的和
    /***
     * 获取疾病概率和疾病名称，并计算疾病概率和
     */
    foreach ($diseaseType as $item) {
        $result = $diagnosis->getDiseaseProbability($item);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $temp[$item] = $row['disease_probability'] * $sum[$item];
                $name[$item] = $row['disease_name'];
                $probabilitySum += $temp[$item];
            }
        } else {
            $content['status'] = 0;
            echo $tools->setData($content);
            die();
        }
    }
    $probability['name'] = $name;
    /***
     * 计算每种疾病的患病概率
     */
    foreach ($diseaseType as $item) {
        $probability['probability'][$item] = $temp[$item] / $probabilitySum;
    }

    /***
     * 将疾病名称和患病概率绑定
     */
    foreach ($diseaseType as $item) {
        $content['result'][$probability['name'][$item]] = $probability['probability'][$item];
    }

    echo $tools->setData($content);
}