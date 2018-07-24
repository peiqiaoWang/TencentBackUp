<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-15
 * Time: 下午10:37
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once "OverTimeSet.class.php";

$set = $_POST['set'];

$OverTimeSet = new OverTimeSet;
$OverTimeSet->OverTimeSetTest($set);
//$GetBigPhoto = new GetBigPhoto;
//$GetBigPhoto->GetBigPhotoTest($set);
//$DeletePost->Get($postId);

?>


