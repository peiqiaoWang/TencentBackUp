<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/14
 * Time: 20:12
 */
header("content-type:text/html; charset=utf-8");
class GetStatePosts
{
    public function getPosts($userName = '',$state = 3,$tableName = ''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');//modify here!
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else {
            $con->query("SET NAMES utf8");
            if ($state == 1){
            $sql = "SELECT Message.messageId,Message.title,Message.photo,Message.postTime,readTime FROM Message,UserMessage 
WHERE UserMessage.userName='$userName' AND (UserMessage.state=1 OR UserMessage.state=3)
AND Message.messageId=UserMessage.messageId GROUP BY messageId ORDER BY readTime DESC;";
            }else{
                $sql = "SELECT Message.messageId,Message.title,Message.photo,Message.postTime,collectTime FROM Message,UserMessage 
WHERE UserMessage.userName='$userName' AND (UserMessage.state=2 OR UserMessage.state=3)
AND Message.messageId=UserMessage.messageId GROUP BY messageId ORDER BY collectTime DESC;";
            }
            $result = $con->query($sql);
            if($result->num_rows){
                $success = true;
                $message = '';
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }else{
                $success = false;
                $message = '没有结果';
                $data[] = null;
            }
            $arr = array(
                'success' => $success,
                'message' => $message,
                'postsnum' => $result->num_rows,
                'data' => $data
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}
