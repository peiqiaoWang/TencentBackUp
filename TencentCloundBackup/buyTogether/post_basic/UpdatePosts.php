<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/16
 * Time: 22:57
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
require_once "UpdatePosts.class.php";

$messageId = $_POST['postsid'];
$title = $_POST['headline'];
$photo = $_FILES['picture'];
$type = $_POST['type'];
$commodity = $_POST['commodity'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$member = $_POST['peoplenum'];
$day = $_POST['day'];
$hour = $_POST['hour'];
$description = $_POST['description'];
$contact = $_POST['contactinformation'];
$tableName = '';

$update = new UpdatePosts;
$update->updateTest($messageId,$title,$photo,$type,$commodity,$price,$unit,$member,$day,$hour,$description,$contact,$tableName);

?>