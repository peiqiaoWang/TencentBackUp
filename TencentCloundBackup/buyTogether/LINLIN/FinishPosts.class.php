<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/16
 * Time: 22:22
 */
header("content-type:text/html; charset=utf-8");
class FinishPosts
{
    public function finishTest($messageId = 0,$tableName = ''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');//modify here!
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $result = $con->query("UPDATE Message SET state='已完成' WHERE messageId=$messageId");
            if($result){
                $success = true;
                $message = '已完成';
            }else{
                $success = false;
                $message = '出错了';
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