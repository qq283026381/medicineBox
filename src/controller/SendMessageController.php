<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/4/15
 * Time: 11:42
 */
require_once '../util/Tools.php';
require_once '../model/Ucpaas.class.php';
$tools = new Tools();
$data = $tools->getData();
/*array(
    'method' => 'register||forgive||expired||taking',
    'data' => array('phone' => '')
);*/
if ($tools->checkData($data)) {
    $id = 'new';
    if ($data['method'] !== 'register') {
        $id = $tools->getUserId();
    }
    $sid = 'a646ea67757929d1166cd965d27c8de7';
    $token = 'b3566b92725b59e61acb1f2b0e0a8196';
    $appid = 'bdfb4900ec59403dbcd222b5e119a2c6';
    $opt['accountsid'] = $sid;
    $opt['token'] = $token;
    $ucpass = new Ucpaas($opt);
    $code = getCode();
    switch ($data['method']) {
        case 'register':
            {
                $templateid = '309359';
                $param = $code;
                $mobile = $data['phone'];
                $uid = $id;
                $mbsco = base64_encode(json_encode(array('code' => $code, 'uid' => $uid)));
                setcookie('mbsco', $mbsco, time() + 180);
                break;
            }
        case 'forget':
            {
                $message = (array)json_decode(base64_decode($_COOKIE['mbfor']));
                if (isset($message['id']) && isset($message['name'])) {
                    $templateid = '309364';
                    $param = $message['name'] . ',' . $code;
                    $mobile = $data['phone'];
                    $uid = $message['id'];
                    $message['code'] = $code;
                    $mbfor = base64_encode(json_encode($message));
                    setcookie('mbfor', $mbfor, time() + 180);
                } else {
                    $result['result'] = false;
                }
                break;
            }
        default:
            $result['result'] = false;
    }
    $response = json_decode($ucpass->SendSms($appid, $templateid, $param, $mobile, $uid));
    $smsResult = getResult($response);
    $result['result'] = $smsResult['msg'] === 'OK';
    echo $tools->setData($result);
}

function getCode()
{
    $str = '1234567890';
    $str = str_shuffle($str);
    $code = substr(str_shuffle($str), rand(0, 6), 4);
    return $code;
}

function getResult($response)
{
    $result = [];
    foreach ($response as $k => $v) {
        $result[$k] = $v;
    }
    return $result;
}