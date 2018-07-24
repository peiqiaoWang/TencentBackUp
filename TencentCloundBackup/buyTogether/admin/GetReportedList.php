<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 21:20
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'GetReportedList.class.php';

$tableName = '';
$messageId = $_POST['messageId'];
$messageNum = $_POST['messageNum'];

$list = new GetReportedList();
$list->getListTest($messageId,$messageNum);
//$list = new GetList;
//$list->getListTest($messageId,$postNum);

?>