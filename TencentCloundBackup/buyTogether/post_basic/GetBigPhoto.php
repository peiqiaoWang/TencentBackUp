<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-15
 * Time: 下午10:37
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once "GetBigPhoto.class.php";

$postId = $_POST['postsid'];

$GetBigPhoto = new GetBigPhoto;
$GetBigPhoto->GetBigPhotoTest($postId);
//$DeletePost->Get($postId);

?>


