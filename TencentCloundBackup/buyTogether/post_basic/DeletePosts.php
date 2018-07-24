<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-15
 * Time: 下午10:37
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once "DeletePosts.class.php";

$postId = $_POST['postsid'];

$DeletePost = new DeletePosts;
$DeletePost->deletePostsTest($postId);

?>


