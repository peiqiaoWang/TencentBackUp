<?php
/**
 * Created by PhpStorm.
 * User: linmouren
 * Date: 2016/11/9
 * Time: 21:08
 */
//写在前面
//重点关注line21 附近信息

//连接服务器和数据库
require_once 'connect.php';
if (isset($_POST)) {
    //取出$_POST发来的数据
    $message_id = $_POST['postsid'];
    //mysql语句，从数据库获取该帖子的详细信息
    $sql_select = "select * from message where messageId='$message_id'";
    $res_select = mysql_query($sql_select);
    $row = mysql_fetch_assoc($res_select);
    //根据接口文档定义的数据打包，并返回
    $data = array(
        'postsid' => $row['messageId'],
        'headline' => $row['title'],
        'picture' => $row['photo'],
        'issuetime' => $row['postTime'],
        'issuername' => $row['userName'],
        'type' => $row['type'],
        'commodity' => $row['commodity'],
        'price' => $row['price'],
        'unit' => $row['unit'],
        'peoplenum' => $row['member'],//接口文档的该变量拼错了
        'deadline' => $row['deadline'],
        'description' =>$row['description'],
        'contactinformation' =>$row['contact']
    );
    $arr = array(
        'success' => true,
        'message' => '',
        'data' => $data
    );
} else {
    //没有$_POST 数据
    $arr = array(
        'success' => false,
        'message' => '数据出错',
        'data' => null
    );
}
echo json_encode($arr);