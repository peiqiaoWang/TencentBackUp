<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 22:53
 */
header("content-type:text/html; charset=utf-8");
class ReportIgnore
{
    public function ignoreTest($messageId = 0){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $sql = "DELETE FROM ReportedMessage WHERE messageId=$messageId;";
            $res = $con->query($sql);
            if($res){
                $success = true;
                $message = '忽视举报';
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
?>
