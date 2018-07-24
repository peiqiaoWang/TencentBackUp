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
        && ($photo["size"] < 2048000*3 && $photo["size"] > 1024000/5 )    // 小于 6 Mb
        && in_array($extension, $allowedExts)
    ) {
//        echo "1";
        if ($photo["error"] > 0) {
            $flag = "false";
        } else {

                if(($photo['type'] == "image/jpeg")
                    ||($photo["type"] == "image/jpg")
                    || ($photo["type"] == "image/pjpeg") ) {
                    $file = $photo['tmp_name'];
                    $percent = 0.5;  //图片压缩比
                    list($width, $height) = getimagesize($file); //获取原图尺寸
                    //缩放尺寸
                    $newwidth = $width * $percent;
                    $newheight = $height * $percent;
                    $src_im = imagecreatefromjpeg($file);
                    //            $src_im = $photo;
                    $dst_im = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    //            header("Content-type: image/jpeg");
                    imagejpeg($dst_im,$target_path); //输出压缩后的图片
                    // print_r($src_im);
                    // print_r($photo);
                    //            imagedestroy($dst_im);
                    //            imagedestroy($src_im);
                    //$photo['tmp_name'] = $dst_im;
                }
                else if(($photo["type"] == "image/png")){
                    $file = $photo['tmp_name'];
                    $percent = 0.5;  //图片压缩比
                    list($width, $height) = getimagesize($file); //获取原图尺寸
                    //缩放尺寸
                    $newwidth = $width * $percent;
                    $newheight = $height * $percent;
                    $src_im = imagecreatefrompng($file);
//                    $src_im = imagecreatefromjpeg($file);
                    //            $src_im = $photo;
                    $dst_im = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    //            header("Content-type: image/jpeg");
                    imagepng($dst_im,$target_path);
//                    imagejpeg($dst_im,$target_path); //输出压缩后的图片
                    // print_r($src_im);
                    // print_r($photo);
                    //            imagedestroy($dst_im);
                    //            imagedestroy($src_im);
                    //$photo['tmp_name'] = $dst_im;
                }

                //echo $base_path;
                $base_path = './bigupload/' . $name . '/';
                $target_path = $base_path . get_basename($photo["name"]);


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
//                echo './'. get_basename($photo["name"]);
                move_uploaded_file($photo['tmp_name'], $target_path);
    //            echo $mesg = "success to upload";
        }
    }else if ((($photo["type"] == "image/gif")
            || ($photo["type"] == "image/jpeg")
            || ($photo["type"] == "image/jpg")
            || ($photo["type"] == "image/pjpeg")
            || ($photo["type"] == "image/x-png")
            || ($photo["type"] == "image/png"))
        && ($photo["size"] > 0 && $photo["size"] < 1024000/5)    // 小于 200kb
        && in_array($extension, $allowedExts)
    ){
//        echo "1";
        if ($photo["error"] > 0) {
            $flag = "false";
        } else {

            if(($photo['type'] == "image/jpeg")
                ||($photo["type"] == "image/jpg")
                || ($photo["type"] == "image/pjpeg") ) {
                $file = $photo['tmp_name'];
                $percent = 1;  //图片压缩比
                list($width, $height) = getimagesize($file); //获取原图尺寸
                //缩放尺寸
                $newwidth = $width * $percent;
                $newheight = $height * $percent;
                $src_im = imagecreatefromjpeg($file);
                //            $src_im = $photo;
                $dst_im = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                //            header("Content-type: image/jpeg");
                imagejpeg($dst_im,$target_path); //输出压缩后的图片
                // print_r($src_im);
                // print_r($photo);
                //            imagedestroy($dst_im);
                //            imagedestroy($src_im);
                //$photo['tmp_name'] = $dst_im;
            }
            else if(($photo["type"] == "image/png")){
                $file = $photo['tmp_name'];
                $percent = 1;  //图片压缩比
                list($width, $height) = getimagesize($file); //获取原图尺寸
                //缩放尺寸
                $newwidth = $width * $percent;
                $newheight = $height * $percent;
                $src_im = imagecreatefrompng($file);
//                    $src_im = imagecreatefromjpeg($file);
                //            $src_im = $photo;
                $dst_im = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                //            header("Content-type: image/jpeg");
                imagepng($dst_im,$target_path);
//                    imagejpeg($dst_im,$target_path); //输出压缩后的图片
                // print_r($src_im);
                // print_r($photo);
                //            imagedestroy($dst_im);
                //            imagedestroy($src_im);
                //$photo['tmp_name'] = $dst_im;
            }

            //echo $base_path;
            $base_path = './bigupload/' . $name . '/';
            $target_path = $base_path . get_basename($photo["name"]);


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
//                echo './'. get_basename($photo["name"]);
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
    $avatorUrl = 'http://123.207.95.161/buyTogether' . '/post_basic/upload/' . $name . '/' . $photo['name'];
    if($photo==null){$avatorUrl=null;}
    return $avatorUrl;
}
