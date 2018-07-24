<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 12:32
 */
header("content-type:text/heml; charset:utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'IssuePosts.class.php';

$title = $_POST['headline'];
$userId = $_POST['issuername'];
$photo = $_POST['picture'];
$type = $_POST['type'];
$commodity = $_POST['commodity'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$member = $_POST['peoplenum'];
$deadline = $_POST['deadline'];
$description = $_POST['description'];
$contact = $_POST['contactinformation'];
$tableName = '';

$postMessage = new IssuePosts;
$postMessage->IssuePostsTest($title,$userId,$photo,$type,$commodity,$price,$unit,$member,$deadline,$description,$contact,$tableName);

?>