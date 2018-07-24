<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 12:33
 */
header("content-type:html/text; charset:utf-8");
error_reporting(E_ALL ^ E_NOTICE);

class IssuePosts
{
    public function IssuePostsTest($title='',$userId='',$photo='',$type='',$commodity='',$price=0,$unit='',$member='',$deadline='',$description='',$contact='',$tableName=''){
        $con = new mysqli('localhost','root','root','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            //
            $result = $con->query("SELECT MAX(messageId) FROM Message");//check this lin
            $messageId = $result->fetch_array()[0];
            //
            $result = $con->query("SELECT emailAddress FROM User WHERE username = '$userId'");
            $emailAddress = $result->fetch_assoc()['emailAddress'];
            //
            $postTime = date('Y-m-d H:h:i',time());
            $sql = "insert into 
message(messageId,phoneNumber,type,title,commodity,postTime,price,unit,member,deadline,description,photo,contact) 
values('$messageId','$emailAddress','$type','$title','$commodity',$postTime,$price,'$unit',$member,$deadline,'$description','$photo','$contact') ";
            $result = $con->query($sql);
            if($result->num_rows){
                $success = true;
                $message = '发帖成功';
            }else{
                $success = false;
                $message = '发帖失败';
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