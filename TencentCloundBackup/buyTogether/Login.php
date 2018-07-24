<?php
/**
 * Created by PhpStorm.
 * User: xqx
 * Date: 18-4-16
 * Time: 上午12:23
 */
header("content-type:text/html; charset=utf-8");
require_once 'Login.class.php';


$userId = $_POST["userId"];
$password = $_POST["password"];
$tableName = 'User';

//echo $userId;
//echo $password;
//echo 'caonima';
$log = new Login;
$response = $log->loginTest($userId,$password,$tableName);

//echo $response;

?>