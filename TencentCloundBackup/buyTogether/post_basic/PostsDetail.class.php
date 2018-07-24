<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/11
 * Time: 23:32
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);

class PostsDetail
{
    public function postsTest($messageId,$userName){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            if($result = $con->query("SELECT * FROM Message WHERE messageId=$messageId")){
                $data = $result->fetch_assoc();
                $timeToDayHour = $data['deadline'];
              //  print_r($timeToDayHour);

                $postTime = date('Y-m-d H:i:s',time());
              //  echo $timeToDayHour;
              //  echo "<br />";

                $day = floor((strtotime($timeToDayHour)-strtotime($postTime))/86400);
                $hour = floor((((strtotime($timeToDayHour)-strtotime($postTime))-$day*86400)/3600));
                $data['day'] = $day;
                $data['hour'] = $hour;
                //print_r($data);
                //修改于1219 by 林淋
                //加入了是否收藏
                $res = $con->query("SELECT * FROM UserMessage WHERE userName='$userName' AND messageId=$messageId;");
                if($res->num_rows){
                    $colect = $res->fetch_assoc()['state'];
                    if($colect==2||$colect==3){
                        $isCollected = true;
                    } else {
                        $isCollected = false;
                    }
                } else {
                    $isCollected = false;
                }
                $data['isCollected'] = $isCollected;
                $success = true;
            }else{
                $success = false;
                $data = null;
            }
            $arr = array(
                'success' => $success,
                'message' => '',
                'data' => $data
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}