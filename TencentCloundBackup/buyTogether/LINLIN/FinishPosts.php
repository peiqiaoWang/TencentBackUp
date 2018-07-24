<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/16
 * Time: 22:22
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'FinishPosts.class.php';
$messageId = $_POST['postsid'];
$tableName = '';

$finish = new FinishPosts;
$finish->finishTest($messageId,$taableName);
?>