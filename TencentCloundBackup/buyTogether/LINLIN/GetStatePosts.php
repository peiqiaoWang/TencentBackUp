<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/14
 * Time: 20:12
 */header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'GetStatePosts.class.php';
$userName = $_POST['username'];
$state = $_POST['state'];
$tableName = '';

$my = new GetStatePosts();
$my->getPosts($userName,$state,$tableName);
?>