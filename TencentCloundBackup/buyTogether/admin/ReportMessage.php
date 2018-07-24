<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 22:07
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'ReportMessage.class.php';

$tableName = '';
$messageId = $_POST['messageId'];

$report = new ReportMessge();
$report->reportMessageTest($messageId);

?>