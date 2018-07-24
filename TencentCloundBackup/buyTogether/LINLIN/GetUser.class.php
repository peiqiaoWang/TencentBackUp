<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/6
 * Time: 23:40
 */
header("content-type:text/html; charset=utf-8");
class GetUser//modify here!
{
    public function getUserTest($userName = ''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');//modify here!
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $sql = "SELECT userName,phoneNumber,emailAddress,sex,name,birthday,school,occupation,headPortait,description FROM User WHERE userName='$userName';";
            $res = $con->query($sql);
            if($res){
                $data = $res->fetch_assoc();
                $success = true;
                $message = '获取成功';
            }else{
                $data = null;
                $success = false;
                $message = '请重试';
            }
            $arr = array(
                'success' => $success,
                'message' => $message,
                'data' => $data
            );

            //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            //echo json_decode($arr);
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}