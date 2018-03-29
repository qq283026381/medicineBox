<?php
/**
 * Created by PhpStorm.
 * User: Vincent
 * Date: 2018/3/29
 * Time: 13:17
 */
require_once '../util/Tools.php';
$tools = new Tools();
if ($tools->checkAuthority() !== 'true') {
    $tools->goBack();
} else {
    setcookie('mbs', NULL);
    setcookie('jti', NULL);
}