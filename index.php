<html>
<head>
<?php
session_start();

$fp=fopen("./db/in",'r+');
$in=fread($fp,filesize("./db/in"));
$in=$in+1;
file_put_contents("db/in",$in);

if(isset($_SESSION["f_fseek_size"])){  
    echo('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>注意！</strong>请刷新页面，若刷新后该提示还存在，请重新在浏览器中输入链接，或者重新返回分享消息再次进入链接</div>');
    }
else{  
    $_SESSION["temp"]='true';      
    }  
    ?>
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
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Welcome~</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!--<li class="active">
							 <a href="#">Link</a>
						</li>
						<li>
							 <a href="#">Link</a>
						</li>
						<li class="dropdown">
							 <a class="dropdown-toggle" href="#" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									 <a href="#">Action</a>
								</li>
								<li>
									 <a href="#">Another action</a>
								</li>
								<li>
									 <a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									 <a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									 <a href="#">One more separated link</a>
								</li>
							</ul>
						</li>-->
						<?php
                        //error_reporting(E_ALL);  
                        error_reporting(E_ALL || ~E_NOTICE);
 
						if($_COOKIE['user']==""){
                            echo('<li><a href="login.php"><span class="glyphicon glyphicon-user"></span>登陆/注册？</a></li><li><a href="space.php">我的单词本</a></li>');
						}
						else{
							$user=$_COOKIE['user'];
							echo('<li><a href="space.php"><span class="glyphicon glyphicon-user"></span>'.$user.'</a></li><li><a href="out.php">退出登录</a></li><li><a href="space.php">我的单词本</a></li>');
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
					准备
				</h1>
				<p>
					据说啊，这是一个测试单词背的怎么样的网页……
				</p>
				<p>
					 <a class="btn btn-primary btn-large" data-toggle="collapse" data-parent="#accordion" 
				   href="#collapse">快速开始</a><small><small><small>（十道题）</small></small></small>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-8 column">
		<div id="collapse" class="panel-collapse collapse">
         <div class="panel-body">
         <center>
	     	<?php error_reporting(E_ERROR); ini_set("display_errors","Off"); $i_=10;require("rand.php"); ?>
         </center>
        </div>
    </div></form>
		</div>
		<div class="col-md-4 column">

		<div class="well well-lg">
		<div class="form-group">
		<center>
		<h1>网站更新公告</h1></center>
		<p>1.新的登陆方式：<b>【刷脸登陆】</b>（测试功能）点击<a href="login.php">这里</a>体验</p>
		<p>2.更新功能：在查词的时候加入了<b>音标</b>和<b>朗读</b></p>
		<p>3.新功能：<b>【听写】</b>，可以在线播放听力音频，自主听写，查看点<a href="listen.php">这里</a><code>该功能为测试功能</code></p>
		<p>(2017年7月10日，21:24)</p>

		</div></div> 
		<?php
        //error_reporting(E_ALL);  
        error_reporting(E_ALL || ~E_NOTICE);
 		if($_COOKIE['user']==""){
        echo('<div class="well well-lg"><form class="bs-example bs-example-form" role="form" action="login_.php" method="POST"><div class="input-group"><span class="input-group-addon">用户名</span><input name="user" type="text" class="form-control" placeholder="User Name"></div><br><button type="button" class="btn btn-default" onclick="this.form.submit()">    登 陆    </button></form></div>');
		}
		else{
		$user=$_COOKIE['user'];
		echo('<div class="well well-lg">欢迎'.$user.'<br>·<a href="out.php">退出登录</a><br>·<a href="space.php">我的单词本</a></div>');
		}
		?>

		 <div class="well well-lg">
		<form action="d_n.php" method="GET">
		<div class="form-group">
		<span class="input-group-addon">自定义题目数量</span>
		<input name="number" class="form-control" type="number" placeholder="输入题目数量（只能为1-2000之间的数字！）" min="1" max="2000"/><br>
		<button class="btn btn-default" onclick="this.form.submit()">开始</button></form>
		</div></div> 

		 <div class="well well-lg">
		<div class="form-group">
		<center>
		<h1>扫一扫进入微信小程序</h1>
		<img src="./db/2.png" width=40%>
		<br><code>虽然在手机上用着方便，但确实没有网页版好用</code>
		</center>
		</div></div> 
		

		</div>
	</div>
</div>


</div>

</body>
</html>