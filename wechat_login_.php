<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//error_reporting(E_ALL);  
error_reporting(E_ALL || ~E_NOTICE);
$user=$_POST['user'];

//判断名为url的cookie变量是否存在
if($_COOKIE['stay']==""){
    //如果不存在，则提示用户是第一次访问本站
    setcookie("stay","0",time()+180);
}else{
    $time=$_COOKIE['stay'];
    if ($time>2){
        echo('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>对不起！</strong>');
        echo("您在3分钟内尝试登陆了三次，请离开页面等待三分钟再进入！</div>");
        echo('<meta http-equiv="refresh" content="0;url=./wx/my.php"> ');
        exit();
    }
    else{
        $time=$time+1;
        setcookie("stay",$time,time()+180);
    }
}

$file = "./user/".$user;

if(file_exists($file))
 {
     setcookie("user",$user,time()+86400);
      echo('<meta http-equiv="refresh" content="0;url=./wx/my.php">');
      echo('<meta http-equiv="refresh" content="0;url=./wx/my.php">');
 }
 else
 {
      $fp=fopen("./user/".$user,'w+');
      chmod("./user/".$user,0777);
      setcookie("user",$user,time()+86400);
      fclose($fp);
      echo('<meta http-equiv="refresh" content="0;url=./wx/my.php"> ');

 }



?>