<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 15:04
 */
require_once '../util/Tools.php';
require_once '../model/UserModel.php';
require_once '../implement/LoginImpl.php';
$tool = new Tools();
$data = $tool->getData();

$name = isset($data['name']) ? $data['name'] : '';
$pwd = isset($data['pwd']) ? $data['pwd'] : '';
if ($name != '' && $pwd != '') {
    $user = new UserModel($name, $pwd, '', '');
    $login = new LoginImpl();
    $result = $login->checkLoginInfo($user);
    $response = [];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $issuer = 'Vincent';
        $str = 'abcdefghijklmnopqrstuvwxyz1234567890QWERTYUIOPASDFGHJKLZXCVBNM';
        $str = str_shuffle($str);
        $jti = substr(str_shuffle($str), rand(0, 52), 10);
        $payload = [
            #非必须。issuer 请求实体，可以是发起请求的用户的信息，也可是jwt的签发者。
            "iss" => $issuer,
            #非必须。issued at。 token创建时间，unix时间戳格式
            "iat" => $_SERVER['REQUEST_TIME'],
            #非必须。expire 指定token的生命周期。unix时间戳格式
            "exp" => $_SERVER['REQUEST_TIME'] + 7200,
            #非必须。接收该JWT的一方。
            "aud" => $row['user_id'],
            # 非必须。JWT ID。针对当前token的唯一标识
            "jti" => $jti,
            # 自定义字段
            "GivenName" => $pwd,
            # 自定义字段
            "name" => $row['login_name'],
        ];
        require_once '../util/JWT.php';
        $jwt = new JWT();
        $token = $jwt->encode($payload, $jti);
        $expire = time() + 1800;
        setcookie('mbs', $token, $expire);
        setcookie('jti', $jti, $expire);
    } else {
        $response['data'] = '没有该用户';
        echo json_encode($response);
    }

}