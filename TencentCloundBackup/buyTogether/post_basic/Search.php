<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 21:27
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'Search.class.php';

$keyword = $_POST['keyword'];
$messageId = $_POST['postsid'];
$messageNum = $_POST['postsnum'];
$tableName = '';

$search = new Search;
$search->searchTest($keyword,$messageId,$messageNum);

?>