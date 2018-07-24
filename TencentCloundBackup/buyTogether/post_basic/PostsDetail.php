<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/11
 * Time: 23:32
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'PostsDetail.class.php';

$messageId = $_POST['postsid'];
$userName = $_POST['userName'];
$tableName = '';

$post = new PostsDetail;
$post->postsTest($messageId,$userName);

?>