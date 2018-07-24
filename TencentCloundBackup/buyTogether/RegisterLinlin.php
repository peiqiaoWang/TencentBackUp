<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/9
 * Time: 22:13
 */
header("content-type:text/html; charset=utf-8");
//error_reporting(E_All^E_NOTICE);
require_once 'RegisterLinlin.class.php';

$userId = $_POST['username'];
$password = $_POST['password'];
$emailAddress = $_POST['emailaddress'];
$identifyingCode = $_POST['identifyingcode'];
$tableName = '';

$register = new RegisterLinlin;
$register->registerTest($userId,$password,$emailAddress,$identifyingCode,$tableName);

?>

