<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-16
 * Time: 下午8:56
 */

class AddTrack
{
    public function addTrackTest($userName,$postsId){
        $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
        if($con->connect_error){
            die('Error : ('. $con->connect_errno .') '. $con->connect_error);
        }else{
            $con = new mysqli('localhost','root','beijingkaoya','buyTogether');
            if($con->connect_error){
                die('Error : ('. $con->connect_errno .') '. $con->connect_error);
            }else{
                $con->query("SET NAMES utf8");
                //修改于1216，加入了时间。
                $time = date('Y-m-d H:i:s',time());
                $sql = "SELECT * FROM Message WHERE WHERE userName = '$userName' AND MessageId = '$postsId';";
                $result = $con->query($sql);
                if($result->num_rows == 1){
                    $success = false;
                    $message = "该帖子是你个人发布的";
                }else{
                    $sql = "SELECT * FROM UserMessage WHERE userName = '$userName' AND MessageId = '$postsId';";
                    $result = $con->query($sql);
                    if($result->num_rows == 0){
                        $sql ="INSERT INTO UserMessage(userName,MessageId,state,readTime) VALUES ('$userName',$postsId,1,'$time');";
                    }else{
                        $ToState = $result->fetch_assoc()['state'];
                        if($ToState == 1 || $ToState == 3){
                            $sql="SET NAMES utf8";
                        }else if($ToState == 2){
                            $sql ="UPDATE UserMessage SET state = 3,readTime='$time' WHERE userName = '$userName' AND MessageId = '$postsId';";
                        }else{
                            $sql ="UPDATE UserMessage SET state = 1,readTime='$time' WHERE userName = '$userName' AND MessageId = '$postsId';";
                        }
                    }
                    $result = $con->query($sql);
                    if($result){
                        $success = true;
                        $message = "加入足迹成功";
                    }else{
                        $success = false;
                        $message = "出错了";
                    }
                }
                $arr = array(
                    'success' => $success,
                    'message' => $message
                );
                echo json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
            }
        }
        mysqli_close($con);
    }
}