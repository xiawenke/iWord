<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Welcome~</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
                    <?php
                        //error_reporting(E_ALL);  
                        error_reporting(E_ALL || ~E_NOTICE);
 
						if($_COOKIE['user']==""){
                            echo('<li><a href="login.php"><span class="glyphicon glyphicon-user"></span>登陆/注册？</a></li> ');
						}
						else{
							$user=$_COOKIE['user'];
							echo('<li><a href="space.php"><span class="glyphicon glyphicon-user"></span>'.$user.'</a></li><li><a href="out.php">退出登录</a></li><li><a href="index.php">回到主页</a></li><li><a href="space.php">我的单词本</a></li>');
						}
						?>

                        <li><a href="listen.php">听写（测试功能）</a></li>
						
					</ul>
					<form class="navbar-form navbar-left" role="search" action="dic.php" method="GET">
						<div class="form-group">
							<input name="word" class="form-control" type="text" placeholder="查个词？"/>
						</div> <button class="btn btn-default" type="submit">Submit</button>
					</form>				
			</nav>


<div class="jumbotron">
                
				<h1>
					这里，是你要的<?php $i_=$_GET['number']; echo $i_; ?>道题！
				</h1>
        
			</div>
<?php
$i_=$_GET['number'];
require("rand.php");
?>