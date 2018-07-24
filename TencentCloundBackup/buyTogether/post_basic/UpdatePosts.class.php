<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/16
 * Time: 22:57
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE);
require_once "UploadPhotoToServer.php";

class UpdatePosts
{
    public function updateTest($messageId=0,$title='',$photo='',$type='',$commodity='',$price=0.0,$unit='',$member='',$day=0,$hour=1,$description='',$contact='',$tableName=''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            //

            $deadline = date('Y-m-d H:i:s',strtotime("+$day day +$hour hour"));
            if($photo != '')
                $photo = uploadPhoto($messageId,$photo);
            $sql = "UPDATE Message SET 
            type='$type',title='$title',commodity='$commodity',price=$price,unit='$unit',member=$member,deadline='$deadline',description='$description',photo='$photo',contact='$contact' 
            WHERE messageId=$messageId";
            $result = $con->query($sql);

            if($result){
                $success = true;
                $message = '修改成功';
            }else{
                $success = false;
                $message = '出错了';
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
