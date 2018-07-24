<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-12
 * Time: 上午10:04
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);
require_once "UploadPhotoToServer.php";

class IssuePosts
{
    public function issueTest($title,$userId,$photo,$type,$commodity,$price,$unit,$member,$day,$hour,$description,$contact){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else {
            $con->query("SET NAMES utf8");
            $sql = "SELECT MAX(messageId) messageId FROM Message";
            $result = $con->query($sql);
            $messageId = $result->fetch_assoc()['messageId'];
            $messageId = $messageId + 1;
            //echo $messageId;

            $postTime = date('Y-m-d H:i:s',time());
            $deadline = date('Y-m-d H:i:s',strtotime("+$day day +$hour hour"));
            //echo $deadline;
            //插入数据库
//            echo $messageId;
            $photo = uploadPhoto($messageId,$photo);
//            echo "photo is ";
//            echo $photo;
            $con->query("SET NAMES utf8");
            $sql = "INSERT INTO Message(messageId,userName,type,title,location,commodity,state,postTime,price,
            unit,member,deadline,description,photo,contact) VALUES ($messageId,'$userId','$type','$title','','$commodity',
            '正在进行','$postTime',$price,'$unit',$member,'$deadline','$description','$photo','$contact')";


            if($result1 = $con->query($sql)){
                //echo "插入成功";
                $success = true;
                $message = "发布成功";
            }else{
                $success = false;
                $message = "系统忙,请重试";
                //echo "插入失败";
            }

            $arr = array(
                'success' => $success,
                'message' => $message
            );
            echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}