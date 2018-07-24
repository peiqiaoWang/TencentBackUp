<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/9
 * Time: 22:14
 */
header("content-type:text/html; charset=utf-8");
//error_reporting(E_All^E_NOTICE);

class RegisterLinlin
{
    public function registerTest($userId="",$password="",$emailAddress='',$identifyingCode='',$tableName=''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $result = $con->query("SELECT * FROM emailAndProve WHERE emailAddress = '$emailAddress' AND proveNumber = '$identifyingCode'");
            if($result->num_rows){
                $result1 = $con->query("SELECT * FROM User WHERE userName = '$userId' OR emailAddress = '$emailAddress';");
                if($result1->num_rows){
                    $success = false;
                    $message = '用户名已存在';
                }else{
                    $result2 = $con->query("INSERT INTO User(userName,password,emailAddress) VALUES ('$userId','$password','$emailAddress')");
                    $success = true;
                    $message = '注册成功';
                }
            }else{
                $success = false;
                $message = '验证码错误';
            }
            $arr = array(
                'success' => $success,
                'message' => $message
            );
            echo stripslashes(json_encode($arr,JSON_UNESCAPED_UNICODE));
        }
       mysqli_close($con);
    }
}

?>
