<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 0:06
 */
////请注意，在本机执行会出错，在服务器上可以正常运行！
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'UpdateUser.class.php';//modify here!
//start here!
$tableName = '';
$userName = $_POST['userName'];
//$phoneNumber = $_POST['phoneNumber'];
//$emailAddress = $_POST['emailAddress'];
$sex = $_POST['sex'];
$name = $_POST['naem'];
$birthday = $_POST['birthday'];
$school = $_POST['school'];
$occupation = $_POST['occupation'];
$headPortait = $_FILES['headPortait'];
//print_r($_POST);
$description = $_POST['description'];

$updateuser = new UpdateUser();
$updateuser->templateTest($userName,$sex,$name,$birthday,$school,$occupation,$headPortait,$description);
//$list = new GetList;
//$list->getListTest($messageId,$postNum);

?>