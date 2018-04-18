<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/18
 * Time: 12:47
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    require_once '../implement/EfficacyImpl.php';
    $operation = new EfficacyImpl();
    $result = $operation->getAllEfficacy();
    $usage = [];
    $type = [];
    $name = [];
    $detail = [];
    $content = [];
    $id = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            //判断usage是否存在数组中
            $usageIndex = checkIndex($usage, $row['usage']);
            //不存在或者数组为空则push
            if ($usageIndex < 0) {
                $usageIndex = array_push($usage, $row['usage']) - 1;
            }
            //判断type是否存在数组中
            $typeIndex = checkIndex($type[$usageIndex], $row['type']);
            //不存在或者数组为空则push
            if ($typeIndex == -1) {
                $type[$usageIndex] = [];
            }
            if ($typeIndex < 0) {
                $typeIndex = array_push($type[$usageIndex], $row['type']) - 1;
            }
            //name数组对应usage和type的二维数组为空则创建数组对象
            if (sizeof($name[$usageIndex][$typeIndex]) == 0) {
                $name[$usageIndex][$typeIndex] = [];
            }
            //push name
            array_push($name[$usageIndex][$typeIndex], $row['name']);
            //detail数组对应usage和type的二维数组为空则创建数组对象
            if (sizeof($detail[$usageIndex][$typeIndex]) == 0) {
                $detail[$usageIndex][$typeIndex] = [];
            }
            //push detail
            array_push($detail[$usageIndex][$typeIndex], array('功能主治' => $row['indications'], '用法用量' => $row['dosage'], '禁忌' => $row['taboo'], '注意事项' => $row['notice'], '不良反应' => $row['reaction']));
            if (sizeof($id[$usageIndex][$typeIndex]) == 0) {
                $id[$usageIndex][$typeIndex] = [];
            }
            array_push($id[$usageIndex][$typeIndex], array('id' => $row['efficacy_id']));
        }
        $content['usage'] = $usage;
        $content['type'] = $type;
        $content['name'] = $name;
        $content['detail'] = $detail;
        $content['id'] = $id;
        echo $tools->setData($content);
    }
}
function checkIndex($array, $item)
{
    if (sizeof($array) == 0) {
        //数组为空
        return -1;
    }
    foreach ($array as $key => $value) {
        if ($value == $item) {
            //数组中有value为item的项
            return $key;
        }
    }
    //数组中没有value为item的项
    return -2;
}