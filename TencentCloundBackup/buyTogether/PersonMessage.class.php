<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 21:29
 */
header("content-type:text/html; charset=utf-8");
class PersonMessage
{
    public function personTest($userName=''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            $result = $con->query("SELECT phoneNumber,emailAddress,sex,birthday,headPortait,name,occupation,description FROM User WHERE userName='$userName'");
            $data = $result->fetch_assoc();
            $arr = array(
                'success' => $data!=null,
                'data' => $data
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}