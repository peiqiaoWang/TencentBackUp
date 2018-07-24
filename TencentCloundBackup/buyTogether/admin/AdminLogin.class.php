<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 15:12
 */
header("content-type:text/html; charset=utf-8");
class AdminLogin
{
    public function adminLoginTest($adminName = '',$password = ''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
//          start here!!!!
            $sql = "SELECT * FROM Admin WHERE adminName='$adminName' AND password='$password';";
            $res = $con->query($sql);
            if($res){
                $success = true;
                $message = '登录成功';
            }else{
                $success = false;
                $message = '请重试';
            }
            $arr = array(
                'success' => $success,
                'message' => $message
            );

            //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            //echo json_decode($arr);
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}