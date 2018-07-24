<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/16
 * Time: 21:42
 */
header("content-type:text/html; charset=utf-8");
class MyPosts
{
    public function myTest($userName = '',$state = '',$tableName = ''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');//modify here!
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $result = $con->query("SELECT * FROM Message WHERE userName='$userName' AND state='$state' ORDER BY messageId DESC");
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