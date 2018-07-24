<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-16
 * Time: 下午8:55
 */

header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once "AddTrack.class.php";

$userName = $_POST['username'];
$postsId = $_POST['postsid'];

$addTrack = new AddTrack;
$addTrack->addTrackTest($userName,$postsId);

?>