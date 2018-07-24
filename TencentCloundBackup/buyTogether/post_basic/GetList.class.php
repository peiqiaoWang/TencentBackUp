<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/10
 * Time: 21:29
 */
//写在前面
//修改于12月15日晚
//由于要传回发帖者的用户名和发帖者的头像，故另作修改，而且返回的帖子的信息有所缩减，不是返回全部帖子信息。
header("content-type:text/html; charset=utf-8");
class GetList
{
    public function getListTest($messageId = '',$postNum){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con->query("SET NAMES utf8");
            if($messageId == 0){
                $con->query("SET NAMES utf8");
                $sql = "SELECT messageId,title,photo,postTime,User.userName,User.headPortait FROM User,Message WHERE Message.userName=User.userName AND state='正在进行' ORDER BY messageId DESC;";
                $result = $con->query($sql);
//                $result = $con->query("SELECT * FROM Message ORDER BY messageId DESC ");
            }else{
                $con->query("SET NAMES utf8");
                $sql = "SELECT messageId,title,photo,postTime,User.userName,User.headPortait FROM User,Message WHERE Message.userName=User.userName AND messageId<$messageId AND state='正在进行' ORDER BY messageId DESC;";
                $result = $con->query($sql);
//                $result = $con->query("SELECT * FROM Message WHERE messageId<=$messageId AND state='正在进行' ORDER BY messageId DESC");
            }
            //print_r($result);
            //echo $result->num_rows;
            if($result->num_rows){
                $listNum = $postNum;//每次获取5条帖子
               //echo "haha";
                while(($row = $result->fetch_assoc()) && $listNum--){
                    //用data数组来存结果
                    $data[] = $row;
                   // echo $row['photo'];
                }
            }else{
                //$data[] = null;
            }
//            echo count($data);
            //$datajson = json_encode($data,JSON_UNESCAPED_UNICODE);
            $arr = array(
                'success' => true,
                'message' => '',
                'postsnum' => count($data),
                'data' => $data
            );

            //echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            //echo json_decode($arr);
            echo json_encode($arr,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
        mysqli_close($con);
    }
}