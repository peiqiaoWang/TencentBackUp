<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-12-14
 * Time: 下午4:52
 */

header("content-type:text/html; charset=utf-8");
error_reporting(E_All^E_NOTICE);

class OverTimeSet
{
    public function OverTimeSetTest($set){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else {
            $con->query("SET NAMES utf8");
            echo $todate = date('Y-m-d H:i:s',time());
            $sql = "UPDATE Message SET state = '已过期' WHERE deadline <  '$todate' AND state <> '已完成'";
            $result = $con->query($sql);
            if($result){
                echo 1;
            }else echo 0;
        }
        mysqli_close($con);
    }
}