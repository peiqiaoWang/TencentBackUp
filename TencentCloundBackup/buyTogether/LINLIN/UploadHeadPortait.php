<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-12
 * Time: 上午11:01
 */
header("content-type:text/html; charset=utf-8");
//定义根路径



//解决basename无法解决中文的函数
function get_basename($filename){
    return preg_replace('/^.+[\\\\\\/]/', '', $filename);
}
function uploadPhoto($name,$photo){
    define('ROOT_PATH', dirname(dirname(__FILE__)));
    //设置文件存放目录
    $base_path = './upload/' . $name . '/';

    if (!is_dir($base_path)) {
        mkdir($base_path,0777,true);
//        if(file_exists($base_path))
//            echo "目录创建成功！";
//        else
//            echo "创建目录失败！";
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
    $target_path = $base_path . get_basename($photo["name"]);

    //var_dump($photo);
    //echo "11";
    // 设置flag;
    $flag = "true";
//    echo $target_path;
    //上传限制，允许上传的图片后缀
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $photo["name"]);
    // 获取文件后缀名
    $extension = strtolower(end($temp));

    if ((($photo["type"] == "image/gif")
            || ($photo["type"] == "image/jpeg")
            || ($photo["type"] == "image/jpg")
            || ($photo["type"] == "image/pjpeg")
            || ($photo["type"] == "image/x-png")
            || ($photo["type"] == "image/png"))
        && ($photo["size"] < 2048000*3)    // 小于 2 Mb
        && in_array($extension, $allowedExts)
    ) {
        if ($photo["error"] > 0) {
            $flag = "false";
        } else {
            move_uploaded_file($photo['tmp_name'], $target_path);
//            echo $mesg = "success to upload";
        }
    } else {
        $mesg = "failde to upload";
    }
//    echo '<br />';
//    echo $target_path;
//    echo '<br />';
//    echo $path;
//    echo '<br />';
    //将图片路径存入数据库S
    $path = str_replace('\\', '/', realpath(ROOT_PATH . '/'));
    $avatorUrl = 'http://123.207.95.161/buyTogether' . '/LINLIN/upload/' . $name . '/' . $photo['name'];

    return $avatorUrl;
}
