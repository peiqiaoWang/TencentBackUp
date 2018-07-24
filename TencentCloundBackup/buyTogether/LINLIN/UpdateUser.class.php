<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 0:07
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
require_once "UploadHeadPortait.php";

class UpdateUser
{
    public function templateTest($userName='',$sex='',$name='',$birthday='',$school='',$occupation='',$headPortait='',$description=''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');//modify here!
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
//          start here!!!!
            $sql_set = "sex='$sex',name='$name',birthday='$birthday',school='$school',occupation='$occupation',description='$description'";

            //更新头像数据
            if($headPortait){
                $headPortait = uploadPhoto($userName,$headPortait);/////how to modify!!!!!!!!!!!!!!!
                $sql_set = $sql_set . ",headPortait='$headPortait'";
            }
            $sql = "UPDATE User SET " . $sql_set . " WHERE userName='$userName';";
            $res = $con->query($sql);
            if($res){
                $success = true;
                $message = '修改成功';
            }else{
                $success = false;
                $message = '请重试';
            }
            $arr = array(
                'success' => $success,
                'message' => $message
            );

            //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            //echo json_decode($arr);
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}