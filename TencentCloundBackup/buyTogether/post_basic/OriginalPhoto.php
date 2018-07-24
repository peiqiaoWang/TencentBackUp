<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/12
 * Time: 19:06
 */
header("content:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
require_once 'OriginalPhoto.class.php';

$messageId = $_POST['messageId'];
$tableName = '';

$photo = new OriginalPhoto();
$photo->getPhoto($messageId);


?>