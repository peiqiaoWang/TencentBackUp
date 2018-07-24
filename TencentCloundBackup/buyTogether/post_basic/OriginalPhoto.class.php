<?php

/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/12
 * Time: 19:07
 */
header("content-type:text/html; charset=utf-8");
class OriginalPhoto
{
    public function getPhoto($messageId = 0){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $sql = "SELECT * FROM Message WHERE MessageId = $messageId;";
            $res = $con->query($sql);
            if($res){
                $photo = $res->fetch_assoc()['photo'];
                $success = true;
                $message = "获取成功";
            }else{
                $photo = null;
                $success = false;
                $message = "请重试";
            }
            $arr = array(
                'success' => $success,
                'message' => $message,
                'photo' => $photo
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}
?>