<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-10
 * Time: 上午12:23
 */
header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);

class ForgetPassword
{
    public function forgetpasswordTest($emailAddress = '',$newPassword = '',$identifyingCode = '',$tableName = ''){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else {
            //echo 'haha';
            $con->query("SET NAMES utf8");
            $result = $con->query("SELECT * FROM emailAndProve WHERE emailAddress = '$emailAddress' AND proveNumber = '$identifyingCode'");
            if($result->num_rows){
                $con->query("SET NAMES utf8");
                $result1 = $con->query("UPDATE User SET password = '$newPassword'   WHERE emailAddress = '$emailAddress'");
                $success = true;
                $message = "修改成功";
            }else{
                $success = false;
                $message = "验证码错误";
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

?>