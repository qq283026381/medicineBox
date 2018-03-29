<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 17:10
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    $token = isset($_COOKIE['mbs']) ? $_COOKIE['mbs'] : '';
    $jti = isset($_COOKIE['jti']) ? $_COOKIE['jti'] : '';
    if ($token != '' && $jti != '') {
        require_once '../util/JWT.php';
        $jwt = new JWT();
        $data = $jwt->decode($token, $jti);
        $result = [];
        switch ($data) {
            case 1:
                $result['result'] = 'token不完整';
                break;
            case 2:
                $result['result'] = 'token加密算法不正确';
                break;
            case 3:
                $result['result'] = '签名不正确';
                break;
            case 4:
                $result['result'] = 'token创建时间有误';
                break;
            case 5:
                $result['result'] = 'token过期';
                break;
            default:
                $result['result'] = 'true';
                break;
        }
        echo json_encode($result);
    } else {
        echo '{"result":"false"}';
    }
}