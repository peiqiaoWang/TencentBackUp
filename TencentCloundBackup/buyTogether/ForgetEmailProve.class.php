<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-9
 * Time: 下午6:40
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);
require_once 'SendEmail.php';

class EmailProve
{
    public function emailTest($emailAddress = "",$tableName = ""){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $result = $con->query( "SELECT * FROM User WHERE emailAddress = '$emailAddress' ");
            if (!mysqli_num_rows($result)) {
                $message = "邮箱未被注册";
                $success = false;
            }else {
                $con->query("SET NAMES utf8");
                $proveNumber = rand(1000,9999);
                $result2 = $con->query( "INSERT INTO $tableName(emailAddress, proveNumber) 
                VALUES ('$emailAddress', '$proveNumber')");
                //发送验证码到邮
                sendEmail($proveNumber,$emailAddress);
                $message = "已发送验证码到您的邮箱";
                $success = true;
            }

            $testJSON = array('success'=>$success,'message'=>$message);
            echo json_encode($testJSON,JSON_UNESCAPED_UNICODE);
            mysqli_close($con);
        }
    }
}

?>