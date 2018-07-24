<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/16
 * Time: 21:42
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'MyPosts.class.php';
$userName = $_POST['username'];
$state = $_POST['state'];
$tableName = '';

$my = new MyPosts;
$my->myTest($userName,$state,$tableName);
?>