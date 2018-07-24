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
$proveNumber =  rand(1000,9999);
$emailAddress = $_POST["emailaddress"];
sendEmail($proveNumber,$emailAddress);
