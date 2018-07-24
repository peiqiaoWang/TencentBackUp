<?php
/**
 * Created by PhpStorm.
 * User: wpq
 * Date: 16-11-9
 * Time: 下午8:40
 * 发送邮件的php
 */
//引入发送邮件
require("smtp.php");

//使用163邮箱服务器

function sendEmail($proveNumber,$emailAddress)
{
	//var_dump($proveNumber);
	//var_dump($emailAddress);
    $smtpserver = "smtp.163.com";

//163邮箱服务器端口

    $smtpserverport = 25;

//你的163服务器邮箱账号

    $smtpusermail = "13075961319@163.com";

//收件人邮箱

    $smtpemailto = "$emailAddress";

//你的邮箱账号(去掉@163.com)

    $smtpuser = "13075961319";//SMTP服务器的用户帐号

//你的邮箱密码

    $smtppass = "beijingkaoya1"; //SMTP服务器的用户密码

//邮件主题

    $mailsubject = "邮件验证码";

//邮件内容

    $mailbody = "你好，您一起买的验证码为$proveNumber";

//邮件格式（HTML/TXT）,TXT为文本邮件

    $mailtype = "TXT";

//这里面的一个true是表示使用身份验证,否则不使用身份验证.

    $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);

//是否显示发送的调试信息

    //$smtp->debug = TRUE;

//发送邮件

   $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
		if($state==""){

		echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";

		echo "<a href='index.html'>点此返回</a>";

		exit();

	}

	echo "恭喜！邮件发送成功！！";

	//echo "<a href='index.html'>点此返回</a>";

	//echo "</div>";
}
