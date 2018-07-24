<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 21:27
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'GetList.class.php';

$messageId = $_POST['postsid'];
$postNum = $_POST['postnum'];
$tableName = '';
//$con = new mysqli('localhost','root','beijingkaoya','buyTogether');
//if($con->connect_error){
//    die('Error : ('. $con->connect_errno .') '. $con->connect_error);
//}else{
//    $con->query("SET NAMES utf8");
//    if($messageId == 0) {
//        //echo "正在进行";
//        $con->query("SET NAMES utf8");
//        $result = $con->query("SELECT * FROM Message WHERE state='正在进行' ORDER BY messageId DESC ");
//    }else{
//        $con->query("SET NAMES utf8");
//        $result = $con->query("SELECT * FROM Message WHERE state='正在进行' ORDER BY messageId DESC ");
//    }
//    if($result->num_rows) {
//        $listNum = 5;//每次获取5条帖子
//        while (($row = $result->fetch_assoc()) && $listNum--) {
//            //用data数组来存结果
//            $data[] = $row;
//            echo $row['photo'];
//        }
//    }
//}
//
$list = new GetList;
$list->getListTest($messageId,$postNum);

?>