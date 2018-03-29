<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 15:04
 */
class Tools
{
    function getData()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    function setData($data)
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function checkAuthority()
    {
        $token = isset($_COOKIE['mbs']) ? $_COOKIE['mbs'] : '';
        $jti = isset($_COOKIE['jti']) ? $_COOKIE['jti'] : '';
        $result = 'false';
        if ($token != '' && $jti != '') {
            require_once 'JWT.php';
            $jwt = new JWT();
            $data = $jwt->decode($token, $jti);
            switch ($data) {
                case 1:
                    $result = 'token不完整';
                    break;
                case 2:
                    $result = 'token加密算法不正确';
                    break;
                case 3:
                    $result = '签名不正确';
                    break;
                case 4:
                    $result = 'token创建时间有误';
                    break;
                case 5:
                    $result = 'token过期';
                    break;
                default:
                    $result = 'true';
                    break;
            }
        }
        return $result;
    }

    function goBack()
    {
        echo "<script>alert('NO ACCESS !');window.location.href='../../login.html';</script>";
    }

    function getUserId()
    {
        $token = isset($_COOKIE['mbs']) ? $_COOKIE['mbs'] : '';
        $jti = isset($_COOKIE['jti']) ? $_COOKIE['jti'] : '';
        $result = 'false';
        if ($token != '' && $jti != '') {
            require_once 'JWT.php';
            $jwt = new JWT();
            $payload = $jwt->decode($token, $jti);
            switch ($payload) {
                case 1:
                    $result = 'token不完整';
                    break;
                case 2:
                    $result = 'token加密算法不正确';
                    break;
                case 3:
                    $result = '签名不正确';
                    break;
                case 4:
                    $result = 'token创建时间有误';
                    break;
                case 5:
                    $result = 'token过期';
                    break;
                default:
                    $result = $payload['aud'];
                    break;
            }
        }
        return $result;
    }
}