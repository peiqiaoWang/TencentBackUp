<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-16
 * Time: 下午8:09
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);
class DeleteStatePosts
{
    public function deleteStatePostsTest($userName,$postsId,$state){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            //echo "haha";
            $con->query("SET NAMES utf8");
            $sql = "SELECT * FROM UserMessage WHERE userName = '$userName' AND MessageId = '$postsId'";
            $result = $con->query($sql);
            $toState = $result->fetch_assoc()['state'];
            if($toState ==1 && $state ==1){
                $sql = "DELETE FROM UserMessage WHERE userName = '$userName' AND MessageId = '$postsId'";
            }else if($toState ==2 && $state ==1) {
                $sql = "";
            }else if($toState ==3 && $state ==1){
                $sql = "UPDATE UserMessage SET state = 2 WHERE userName = '$userName' AND MessageId = '$postsId'";
            }else if($toState ==1 && $state ==2){
                $sql = "";
            }else if($toState ==2 && $state ==2){
                $sql = "DELETE FROM UserMessage WHERE userName = '$userName' AND MessageId = '$postsId'";;
            }else if($toState ==3 && $state ==2){
                $sql = "UPDATE UserMessage SET state = 1 WHERE userName = '$userName' AND MessageId = '$postsId'";
            }
            $result = $con->query($sql);
            if($result){
                $success = true;
                $message = "删除状态成功";
            }else{
                $success = false;
                $message = "出错了";
            }
            $arr = array(
                'success' => $success,
                'message' => $message
            );
            echo json_encode($arr,SON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}