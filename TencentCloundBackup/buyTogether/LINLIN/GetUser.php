<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/6
 * Time: 23:37
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'GetUser.class.php';//modify here!
//start here!
$tableName = '';
$userName = $_POST['userName'];

$getuser = new GetUser();
$getuser->getUserTest($userName);

?>