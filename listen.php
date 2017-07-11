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
					听写
				</h1>
				<p>
					现在，你要做的是拿出一张纸和一支笔，然后播放音频进行单词听写！(该功能为测试功能。)
				</p>               
			</div>

<form class="form-horizontal" role="form" action="listen_.php" method="GET">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">听写单词的个数</label>
    <div class="col-sm-10">
      <input name="number" type="number" class="form-control" id="firstname" placeholder="个数大于0，小于30。">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="type" value="ch" type="radio">念中文，写英文   <input name="type" value="en" type="radio">念英文写英文和中文
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="voice" value="1" type="radio">男声   <input name="voice" value="0" type="radio">女声   
        </label>
      </div>
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
  <code>最好多次尝试适合的声音，建议选择女声，语音合成功能由百度AI提供！</code>
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit"id="fat-btn" class="btn btn-primary" data-loading-text="声音合成中，需要一点时间，请稍后……" type="button"> 开始</button>
      <script>
    $(function() {
        $(".btn").click(function(){
            $(this).button('loading').delay(1000).queue(function() {
            // $(this).button('reset');
            // $(this).dequeue(); 
            });
        });
    });  
</script>
    </div>
  </div>
</form>