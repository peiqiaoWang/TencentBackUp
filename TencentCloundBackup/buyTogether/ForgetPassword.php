<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-10
 * Time: 上午12:23
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);
require_once "ForgetPassword.class.php";

$emailAddress = $_POST['emailaddress'];
$newPassword = $_POST['newpassword'];
$identifyingCode = $_POST['identifyingcode'];
$tableName = "";

//echo $newPassword;
//echo 'caonima';
$forgetPassword = new ForgetPassword;
$forgetPassword->forgetpasswordTest($emailAddress,$newPassword,$identifyingCode,$tableName);

?>
