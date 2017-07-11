<html>
<head>
<script type="text/javascript">
$(function(){
	$(".close").click(function(){
		$(".alert").alert('close');
	});
});  
</script>   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf-8"> 
	<title>Login</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>

<body>
<center>
<div class="jumbotron">
                
				<h1>
					注册人脸
				</h1>

			</div>
<?php
// 引入人脸检测Face SDK
require_once './tools/baidu_face/AipFace.php';

// 定义常量
const APP_ID = '';
const API_KEY = '';
const SECRET_KEY = '';

// 初始化
$aipFace = new AipFace(APP_ID, API_KEY, SECRET_KEY);

if (isset($_POST['page'])) {
    //
}
else{
    echo('
    <div class="well well-lg"><h2>上传人脸</h2>
<form class="bs-example bs-example-form" role="form" action="register_face.php" method="POST" enctype="multipart/form-data">
    <div class="input-group">
        <span class="input-group-addon">用户名(没有请留空）</span>
        <input name="user" type="text" class="form-control" placeholder="之前没有用户名请留空！">
        <code>已有用户名请使用旧的用户名登陆，保证单词本的内容会被同步，没有用户名请留空！！</code><br>
        <br><span class="input-group-addon">上传只有自己一个人的照片</span>
        <input name="file" type="file" class="form-control" placeholder="photo">
        <input name="page" type="hidden" value="process">
        <code>免责声明：本网站绝对不会保存您的照片，保存人像参数由百度AI负责，与本站无关！</code>
    </div>
    <br><button id="fat-btn" onclick="this.form.submit()" class="btn btn-primary" data-loading-text="正在处理……" 
    type="button"> 注册
</button>
<script>
    $(function() {
        $(".btn").click(function(){
            $(this).button("loading").delay(1000).queue(function() {
            // $(this).button("reset");
            // $(this).dequeue(); 
            });
        });
    });  
</script>
</div></form>
    ');
}

if (isset($_POST['page'])) {
    //
}
else{
    exit();
}

if($_POST['page']=='process'){

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

if ($_POST['user']=="") {
    $user=('user'.$rand);
}
else{
    $user=$_POST['user'];
}


 $b=($aipFace->addUser(
     $rand, //人脸ID
     $user, //人脸信息
     'user', //分组
     file_get_contents($filepath) //人脸
 ));

 unlink($filepath);

if (isset($b['error_msg'])) {
    $error_msg=$b['error_msg'];
    echo($error_msg);
    if($error_msg=="image size error"){
        echo("格式或文件大小错误！");
    }
    if($error_msg=="face not found"){
    echo("未找到人脸！");
    }
    echo("<br>遇到错误请返回重新上传QAQ<br><h2><a href='register_face.php'>返回</a></h2><br>错误日志：");
    print_r($b);
    exit();
}

echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Welcome!</strong>大功告成，人脸注册成功！</div>');
echo("<h2><a href='login.php'>返回登陆</a></h2>");
echo("<code>要是出现诡异的提示请换一张照片试试！</code>");
//这里可能掉了一个}
