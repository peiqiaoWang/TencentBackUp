<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-16
 * Time: 下午8:02
 */

header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once "DeleteStatePosts.class.php";

$userName = $_POST['username'];
$postsId = $_POST['postsid'];
$state = $_POST['state'];

//echo "haha";

$deleteStatePosts = new DeleteStatePosts;
$deleteStatePosts->deleteStatePostsTest($userName,$postsId,$state);

?>