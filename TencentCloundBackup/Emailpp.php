<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-9
 * Time: 下午6:40
 */
header("content-type:text/html; charset=utf-8");
//error_reporting(E_All^E_NOTICE);
require_once 'SendEmail.php';
$proveNumber =  1234;
$emailAddress = "522464345@qq.com";
sendEmail($proveNumber,$emailAddress);
