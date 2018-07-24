<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 21:27
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'PersonMessage.class.php';

$userName = $_POST['username'];
$tableName = '';

$person = new PersonMessage();
$person->personTest($userName);

?>