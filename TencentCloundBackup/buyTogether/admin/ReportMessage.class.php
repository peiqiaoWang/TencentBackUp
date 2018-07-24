<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 22:07
 */
header("content-type:text/html; charset=utf-8");
class ReportMessge
{
    public function reportMessageTest($messageId = 0){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $sql = "SELECT * FROM ReportedMessage WHERE messageId=$messageId;";
            $res = $con->query($sql);
            if(!$res->num_rows){
                $sql = "INSERT INTO ReportedMessage(messageId) VALUES ($messageId);";
                $res = $con->query($sql);
                $message = '举报成功';
            }else{
                $message = '已举报';
            }
            $arr = array(
                'success' => true,
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
