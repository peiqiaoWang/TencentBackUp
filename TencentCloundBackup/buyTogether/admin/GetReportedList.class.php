<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/12/7
 * Time: 21:21
 */
header("content-type:text/html; charset=utf-8");
class GetReportedList
{
    public function getListTest($messageId = 0,$messageNum = 0){//modify here!
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
/*            if($messageId){
                $sql = "SELECT messageId,title FROM Messge,ReportedMessage WHERE Message.messageId=ReportedMessage.messageId ORDER BY messageId;";
            }else{
                $sql = "SELECT Message.messageId,title FROM Message,ReportedMessage WHERE Message.messageId=ReportedMessage.messageId AND Message.messageId>$messageId ORDER BY messageId;";
            }*/
            $sql = "SELECT Message.messageId,title FROM Message,ReportedMessage WHERE Message.messageId=ReportedMessage.messageId AND Message.messageId>$messageId ORDER BY messageId;";
            $res = $con->query($sql);
            $number = $messageNum;
            if($res){
                while(($row = $res->fetch_assoc()) && $number--){
                    $data[] = $row;
//                    print_r($row);
                }
                $success = true;
                $messageNum = count($data);
            }else{
                $data = null;
                $success = false;
                $messageNum = 0;
            }
//            echo "print this line <br />";
            $arr = array(
                'success' => $success,
                'message' => '',
                'messageNum' => $messageNum,
                'data' => $data
            );

            //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            //echo json_decode($arr);
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}
?>
