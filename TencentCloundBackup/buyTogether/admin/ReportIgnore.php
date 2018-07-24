<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 22:52
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'ReportIgnore.class.php';

$tableName = '';
$messageId = $_POST['messageId'];

$ignore = new ReportIgnore();
$ignore->ignoreTest($messageId);
?>