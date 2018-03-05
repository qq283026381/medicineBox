<?php

/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/5
 * Time: 15:14
 */
class JWT
{
    public static function encode($payload, $key, $alg = 'SHA256')
    {
        $key = md5($key);
        $jwt = base64_encode(json_encode(['typ' => 'JWT', 'alg' => $alg])) . '.' . base64_encode(json_encode($payload));
        return $jwt . '.' . self::signature($jwt, $key, $alg);
    }

    public static function signature($input, $key, $alg)
    {
        return hash_hmac($alg, $input, $key);
    }

    public static function decode($jwt, $key)
    {
        $key = md5($key);
        $tokens = explode('.', $jwt);

        if (count($tokens) != 3) {
            return 'token不完整';
        }
        list($header64, $payload64, $sign) = $tokens;

        $header = json_decode(base64_decode($header64), JSON_OBJECT_AS_ARRAY);
        if (empty($header['alg'])) {
            return 'token 加密算法不正确';
        }

        if (self::signature($header64 . '.' . $payload64, $key, $header['alg']) !== $sign) {
            return '签名不正确';
        }

        $payload = json_decode(base64_decode($payload64), JSON_OBJECT_AS_ARRAY);

        $time = $_SERVER['REQUEST_TIME'];
        if (isset($payload['iat']) && $payload['iat'] > $time) {
            return 'token创建时间有误';
        }

        if (isset($payload['exp']) && $payload['exp'] < $time) {
            return 'token过期';
        }

        return $payload;
    }
}