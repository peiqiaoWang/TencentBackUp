<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type,Accept");
header("Access-Control-Allow-Methods: GET, POST , PUT,DELETE");
header("content-type:text/html;charset=utf-8");

function connectDatabase(){
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
}

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


function getListFromActivate($conn){
    $getListFromActivateSql = "SELECT * FROM Activate";
    $result = $conn->query($getListFromActivateSql);
    $data = array();

    while($row = $result->fetch_assoc()) {
        $row = array_merge($row,array('ActivateCode' => getActivateCode($row['DeviceCode'])));
        array_push($data,$row);
    }
    return $data;
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

echo json_encode(getListFromActivate($conn),JSON_UNESCAPED_UNICODE);
