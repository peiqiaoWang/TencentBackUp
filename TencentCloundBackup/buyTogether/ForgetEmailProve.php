<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-9
 * Time: 下午6:38
 */
header("content-type:text/html; charset=utf-8");
require_once 'ForgetEmailProve.class.php';
error_reporting(E_All^E_NOTICE);


$emailAddress = $_POST["emailaddress"];
$tableName = 'emailAndProve';


$emailProve = new EmailProve;
$emailProve->emailTest($emailAddress,$tableName);


?>

