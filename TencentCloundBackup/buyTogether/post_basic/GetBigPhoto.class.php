<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/11
 * Time: 23:32
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE);

class GetBigPhoto
{
    public function GetBigPhotoTest($messageId){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            if($result = $con->query("SELECT * FROM Message WHERE messageId=$messageId")){
                $data = $result->fetch_assoc();
                $url = $data['photo'];
                //  print_r($timeToDayHour);
//                echo $url;

                $str2='bigupload';
                $url = str_replace("upload","bigupload",$url);
//                echo $url
//                $rel=preg_replace('/upload/',$str2,$url);
                //print_r($data);
                $success = true;
            }else{
                $success = false;
            }
            $arr = array(
                'success' => $success,
                'message' => $url,
//                'data' => $data
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}