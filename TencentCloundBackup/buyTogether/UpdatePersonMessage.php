<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-15
 * Time: 下午7:03
 */

header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);
require_once "UpdatePersonMessage.class.php";

$userName = $_POST['username'];
$sex = $_POST['sex'];
$birthday = $_POST['birthday'];
$occupation = $_POST['occupation'];
$school = $_POST['school'];
$description = $_POST['description'];

$UpdatePersonMessage = new UpdatePersonMessage;
$UpdatePersonMessage->updatePersonEssageTest($userName,$sex,$birthday,$occupation,$school,$description);


?>


