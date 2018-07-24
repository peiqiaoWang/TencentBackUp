<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-15
 * Time: 下午7:07
 */


header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);

class UpdatePersonMessage
{
    public function updatePersonEssageTest($userName,$sex,$birthday,$occupation,$school,$description){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else {
            $con->query("SET NAMES utf8");
            $sql = "UPDATE User SET sex = '$sex',birthday = '$birthday',
            occupation = '$occupation',school = '$school',description = '$description' 
            WHERE userName = '$userName'";
            $result = $con->query($sql);
            //print_r($result);
            if($result){
                $success = true;
                $message = "修改成功";
            }else{
                $success = false;
                $message = "修改失败";
            }
            $arr = array(
                'success' => $success,
                '$message' => $message
            );
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}

?>