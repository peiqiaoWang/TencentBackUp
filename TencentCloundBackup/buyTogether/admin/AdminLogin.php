<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 15:12
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'AdminLogin.class.php';//modify here!
//start here!
$tableName = '';
$adminName = $_POST['adminName'];
$password = $_POST['password'];

$login = new AdminLogin();
$login->adminLoginTest($adminName,$password);
//$list = new GetList;
//$list->getListTest($messageId,$postNum);

?>