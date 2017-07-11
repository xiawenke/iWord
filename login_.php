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
// 引入人脸检测Face SDK
require_once './tools/baidu_face/AipFace.php';

// 定义常量
const APP_ID = '9872531';
const API_KEY = 'GGeypgX3jQ77fZ4cvWzwPCGw';
const SECRET_KEY = 'OQYEnon5XMM4jx7MalTo7t7qesBAOdfg';

// 初始化
$aipFace = new AipFace(APP_ID, API_KEY, SECRET_KEY);

if (isset($_POST['page'])) {
    //
}
else{
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
        include("index.php");
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
      echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Welcome!</strong>'.$user.'，Welcome back!（登陆若没有立即生效请点<a href="index.php">这里</a>！）</div>');
      echo('<div id="myAlert" class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>如果您是新用户请注意！</strong>用户名'.$user.'已被注册，点击<a href="out.php">这里</a>退出登录并更换用户名，若您是该用户名的注册人，请忽略！</div>');
 }
 else
 {
      $fp=fopen("./user/".$user,'w+');
      chmod("./user/".$user,0777);
      setcookie("user",$user,time()+86400);
      fclose($fp);
      echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Registered!</strong>'.$user.'，Welcome back!（登陆若没有立即生效请点<a href="index.php">这里</a>！）</div>');

 }

if (isset($_POST['page'])) {
    //
}
else{
    exit();
}

include("index.php");
}
if($_POST['page']=='face'){

if (isset($_FILES['file'])) {
   
}
else{
    echo'没有照片';
    exit();
}
if ((($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
        /**
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    **/

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      $rand=rand(0,99999999);
      $filepath=("./baidu_face_temp/".$rand.$_FILES["file"]["name"]);
      move_uploaded_file($_FILES["file"]["tmp_name"],$filepath);
      //echo "Stored in: " . "./" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "错误：可能是文件过大或者格式错误！";
  }

}

//人脸识别
//array(3) { ["result"]=> array(1) { [0]=> array(4) { ["uid"]=> string(5) "39339" ["scores"]=> array(1) { [0]=> int(100) } ["group_id"]=> string(4) "user" ["user_info"]=> string(7) "LazyMan" } } ["result_num"]=> int(1) ["log_id"]=> float(2.703333247071E+15) } 
 $user=($aipFace->identifyUser(
     'user', //分组
     file_get_contents($filepath) //人脸
 ));

if (isset($user['error_msg'])) {
    $error_msg=$user['error_msg'];
    echo($error_msg);
    if($error_msg=="image size error"){
        echo("格式或文件大小错误！");
    }
    if($error_msg=="face not found"){
    echo("未找到人脸！");
    }
    echo("<br>遇到错误请返回重新上传QAQ<br><h2><a href='register_face.php'>返回</a></h2><br>错误日志：");
    print_r($user);
     unlink($filepath);
    exit();
}

if (isset($user)) {
    
}
else{
     unlink($filepath);
     echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>不幸的，</strong>登陆失败</div>');

}


$user=$user['result'][0]['user_info'];

$file = "./user/".$user;


if(file_exists($file))
 {
     setcookie("user",$user,time()+86400);
      echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Welcome!</strong>'.$user.'，Welcome back!（登陆若没有立即生效请点<a href="index.php">这里</a>！）</div>');
      include("index.php");
 }
 else
 {
      $fp=fopen("./user/".$user,'w+');
      chmod("./user/".$user,0777);
      setcookie("user",$user,time()+86400);
      fclose($fp);
      echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Registered!</strong>'.$user.'，Welcome back!（登陆若没有立即生效请点<a href="index.php">这里</a>！）</div>');
      include("index.php");

 }
?>