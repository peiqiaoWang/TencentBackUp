<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type,Accept");
header("Access-Control-Allow-Methods: GET, POST , PUT,DELETE");
header("content-type:text/html;charset=utf-8");



function getActivateCode($deviceFeatureCode){
    $activate = md5($deviceFeatureCode . 'one');
    $activate = md5($activate . 'two');
    $activateCode = '';
    for($i = 0; $i < 8; $i++){
        $activateCode = $activateCode . chr((((int)$activate[ $i*4 ]+$activate[ $i*4 + 1 ]+$activate[ $i*4 + 2 ]+$activate[ $i*4 + 3 ])%26 + 65));
        if(($i+1)%2 == 0){
            $activateCode = $activateCode . '-';
        }
    }
//    echo substr($activateCode,0,-1);
    return substr($activateCode,0,-1);
}

function InsertToActivate($deviceFeatureCode,$registerMail,$registerName,$registerReason,$conn){
    $InsertToActivateSql = "INSERT INTO Activate(Name,Mail,Reason,DeviceCode) VALUES ('$registerName','$registerMail','$registerReason','$deviceFeatureCode')";
    $conn->query($InsertToActivateSql);
}

$servername = "localhost";
$username = "root";
$password = "beijingkaoya";
$dbname = "sdn";

//连接数据库
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connect failed:". $conn->connect_error);
}

$conn->query("set names utf8");

$deviceFeatureCode = $_POST['Device_Feature_Code'];
$registerMail = $_POST['Mail'];
$registerName = $_POST['Name'];
$registerReason = $_POST['Reason'];

$returnJson = array();
$returnJson['Success'] = true;
$returnJson['Message']['content'] = '请求已发送，请等候邮件回复,或直接联系有关人员';
InsertToActivate($deviceFeatureCode,$registerMail,$registerName,$registerReason,$conn);
echo  json_encode($returnJson,JSON_UNESCAPED_UNICODE);
