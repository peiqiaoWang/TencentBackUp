<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 21:29
 */
header("content-type:text/html; charset=utf-8");
class Search
{
    public function searchTest($keyword = '',$messageId=0,$messageNum=0){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            if($messageId == 0){
                $search_condition = "state='正在进行' AND (type LIKE '%$keyword%' OR title LIKE '%$keyword%' OR userName LIKE '%$keyword%' OR location LIKE '%$keyword%' OR commodity LIKE '%$keyword%' OR description LIKE '%$keyword%') ORDER BY messageId DESC";
            }else{
                $search_condition = "messageId<$messageId AND state='正在进行' AND (type LIKE '%$keyword%' OR title LIKE '%$keyword%' OR userName LIKE '%$keyword%' OR location LIKE '%$keyword%' OR commodity LIKE '%$keyword%' OR description LIKE '%$keyword%') ORDER BY messageId DESC";
            }
            $result = $con->query("SELECT * FROM Message WHERE $search_condition");
            //echo $result->num_rows;
            if($result->num_rows){
                $success = true;
                $message = '';
                //set the list number!
                $list_num = $messageNum;
                while(($row = $result->fetch_assoc()) && $list_num--){
                    $data[] = $row;
//                    print_r($row);
//                    echo '<br />';
                }
            }else{
                $success = false;
                $message = '没有结果';
                $data[] = null;
            }
            $arr = array(
                'success' => $success,
                'message' => $message,
                'messageNum' => $messageNum<$result->num_rows?$messageNum:$result->num_rows,
                'data' => $data
            );

            //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            //echo json_decode($arr);
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}