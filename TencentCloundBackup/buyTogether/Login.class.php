<?php
/**
 * Created by PhpStorm.
 * User: xqx
 * Date: 2018/4/16
 * Time: 23:05
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
class Login
{
    public function loginTest($userId = "",$password = "", $tablenName = ""){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            //echo  "sainimu";
            $con->query("SET NAMES utf8");
            $sql = "SELECT userName,phoneNumber,emailAddress,sex,name,birthday,school,occupation,headPortait,description FROM User WHERE userName='$userId' OR emailAddress='$userId' AND password='$password';";
//            $result = $con->query( "SELECT * FROM $tablenName WHERE userName = '$userId' AND password = '$password'");
//            $result1 = $con->query( "SELECT * FROM $tablenName WHERE emailAddress = '$userId' AND password = '$password'");
            $res = $con->query($sql);
            if(mysqli_num_rows($res)){
                $success = true;
                $message = "登录成功";
                $data = $res->fetch_assoc();
            }else{
                $success = false;
                $message = "请重试";
                $data = null;
            }
//            if(mysqli_num_rows($res)){
//                $success = true;
//                $message = "登录成功";
//                $data = $userId;
//            }else if(mysqli_num_rows($result1)){
//                $success = true;
//                $message = "登录成功";
//                $userName = $result1->fetch_assoc()["userName"];
//            }else{
//                $success = false;
//                $message = "登录失败";
//                $userName = "";
//            }
            $arr = array(
                "success" => $success,
                "message" => $message,
                "data" => $data
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            //echo $result1->num_rows;
            /*if (mysqli_num_rows($result) || $result1->num_rows) {
                echo json_encode(true);
            }else {
                echo json_encode(false);
            }*/
            mysqli_close($con);
        }
    }
}