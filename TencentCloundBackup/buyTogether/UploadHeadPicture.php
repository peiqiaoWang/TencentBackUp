<?php
/**
 * 上传个人头像
 */
header("content-type:text/html; charset=utf-8");
//定义根路径
define('ROOT_PATH', dirname(dirname(__FILE__)));

//解决basename无法解决中文的函数
function get_basename($filename){
    return preg_replace('/^.+[\\\\\\/]/', '', $filename);
}

$name = $_POST['username'];
//设置文件存放目录
$base_path = './upload/' . $name . '/';


//为用户设置个人文件夹
if (!is_dir($base_path)) {
    mkdir($base_path,0777,true);
    if(file_exists($base_path))
        echo "目录创建成功！";
    else
        echo "创建目录失败！";
} else {
    $dh = opendir($base_path);
    while ($file = readdir($dh)) {
        //echo "1";
        if ($file != "." && $file != "..") {
            $fullpath = $base_path . "/" . $file;
            //echo $fullpath;
            if (!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                // echo 'mubiao';
                rmdir($fullpath);
                // echo 'jieguo';
            }
        }
    }
    closedir($dh);

}

//文件存放位置
$target_path = $base_path . get_basename($_FILES["file"]["name"]);

// 设置flag;
$flag = "true";

//上传限制，允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
// 获取文件后缀名
$extension = strtolower(end($temp));

if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 2048000)    // 小于 2 Mb
    && in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        $flag = "false";
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $mesg = "success to upload";
    }
} else {
    $mesg = "failde to upload";
}

$con = new mysqli('localhost','root','beijingkaoya','buyTogether');
if($con->connect_error){
    die('Error : ('. $con->connect_errno .') '. $con->connect_error);
}

//判断文件是否上传成功
if ($flag == "false") {
    $array = array(
        "status" => false,
        "msg" => $mesg . ' ' . $_FILES['file']['name']);
} else {

    $array = array(
        "status" => true,
        "msg" => $mesg . ' ' . $_FILES ['file'] ['name']);

    //将图片路径存入数据库S
    $path = str_replace('\\', '/', realpath(ROOT_PATH . '/'));
    $avatorUrl = $path . '/test_picture/upload/' . $name . '/' . $_FILES['file']['name'];

    // $con = getConnection();
    $con->query("SET NAMES utf8");

    $sql = "UPDATE User SET headPortait = '$avatorUrl' WHERE userName = '$name'";

    if ($con->query($sql)) {
        echo "success ";
    } else {
        echo "falid ";
    }

    $con->close();

}

echo '<br>';

echo json_encode($array,JSON_UNESCAPED_UNICODE);