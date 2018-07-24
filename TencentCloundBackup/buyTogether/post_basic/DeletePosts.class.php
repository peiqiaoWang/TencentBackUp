<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-15
 * Time: 下午10:38
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);

class DeletePosts
{
    public function deletePostsTest($postId){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            //echo "haha";
            $con->query("SET NAMES utf8");
            $sql = "SELECT * FROM Message WHERE messageId = $postId";
            $result = $con->query($sql);
           // print_r($result);
            //echo $result ->fetch_assoc()['photo'];
            $result = $result ->fetch_assoc()['photo'];

            if (!is_dir($result)) {
                unlink($result);
            } else {
                 // echo 'mubiao';
                rmdir($result);
                // echo 'jieguo';
            }
            $sql = "DELETE FROM Message WHERE messageId = $postId";
            $result = $con->query($sql);
            $sql = "DELETE FROM UserMessage WHERE messageId =$postId;";
            $result = $con->query($sql);
            if($result){
                $success = true;
                $message = "删除成功";
            }else{
                $success = false;
                $message = "删除失败";
            }

            $arr = array(
                'success' => $success,
                'message' => $message
            );

            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}