<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-12
 * Time: 上午9:49
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);
require_once "IssuePosts.class.php";

$title = $_POST['headline'];
$userId = $_POST['issuername'];
$photo = $_FILES['picture'];
$type = $_POST['type'];
$commodity = $_POST['commodity'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$member = $_POST['peoplenum'];
//$deadline = $_POST['deadline'];
$day = $_POST['day'];
$hour = $_POST['hour'];
$description = $_POST['description'];
$contact = $_POST['contactinformation'];

//var_dump($photo);
//echo '<br />';
//echo "$title $userId  $type $commodity $price $unit $member
//       $deadline $description $contact";
//
//echo '<br />';

$issuePosts = new IssuePosts;
$issuePosts->issueTest($title,$userId,$photo,$type,$commodity,$price,$unit,$member,$day,$hour,$description,$contact);


?>
