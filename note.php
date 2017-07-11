<html>
<head>
<script type="text/javascript">  
     function check(){  
          var nameValue=window.document.getElementById("uname").value;  
           if (nameValue == "") // 或者是!nameValue  
           {  
               window.alert("用户名不能为空!");  
               return false;  
           }  
           return true;  
       }  
     </script>  
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
	<title>welcome!</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<?php
if($_COOKIE['user']==""){
    echo('<div id="myAlert" class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>对不起</strong>您还没有登录！</div>');
    include("login.php");
    exit();
}

$user=$_COOKIE['user'];
$mark=$_POST['mark'];
$word=$_POST['word'];
$r=rand(0,9999999);
file_put_contents("./user/".$user,"<note><n>".$r."</n>".$mark."".$word."</note>\n",FILE_APPEND);
echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>成功！</strong>错词已保存！(若没有看到新加入的错词请点<a href="space.php">这里</a>！)</div>');
include("space.php");