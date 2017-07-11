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
					准备听写…
				</h1>
				<p>
					点击播放听写音频
				</p>               
			</div>
		
<code>由于百度AI不支持在语言中加入停顿，所以请手动逐个播放音频，或者滑到页面最下面播放整个完整的音频</code><br>
<code>提示：播放音频时使用电脑大多数浏览器会支持点击空格暂停播放，若浏览器支持则播放完整的音频会更方便</code>	<br>


<ul class="list-group">
<?php
function getLine($file, $line, $length = 4096){ 
   $returnTxt = null; // 初始化返回 
   $i = 1; // 行数 
   $handle = @fopen($file, "r"); 
   if ($handle) { 
      while (!feof($handle)) { 
         $buffer = fgets($handle, $length); 
         if($line == $i) $returnTxt = $buffer; 
         $i++; 
      } 
      fclose($handle); 
   } 
   return $returnTxt; 
}

if (isset($_GET['type'])) {
    //
}
else{
    echo("缺少参数，请返回前一个页面。");
		exit();
}

if (isset($_GET['voice'])) {
    //
}
else{
    echo("缺少参数，请返回前一个页面。");
		exit();
}

if (isset($_GET['type'])) {
    //
}
else{
    echo("缺少参数，请返回前一个页面。");
		exit();
}

$i_=$_GET['number'];
$number=$_GET['number'];
$type=$_GET['type'];
$db_file='./db/dic.db';
$line = count(file($db_file));   
$speakword="";
$voice_file=rand(1,99999999);
$key_file="";
$voice_type=$_GET['voice'];

if($number<1){
	echo("输入的题目数必须为0-30之间的数！");
	echo("error:".$number);
	exit();
}
if($number>30){
	echo("输入的题目数必须为0-30之间的数！");
	echo("error:".$number);
	exit();
}

while(1==1){
	  $voice_file=rand(1,99999999);
    $rand=rand(0,6);
    $con="";
    $i=$i+1;
    $rand=rand(1,$line);
    $word_=getLine($db_file,$rand);
    //echo $word_;
    $arr = explode(" ",$word_); 
    //print_r($arr);
    $word=$arr[0];
    $key=$arr[1];
		$word_key=($word.$key."<br>");	
		if ($type=="en"){
			$word=$arr[0];
		}
		else{
			$word=$arr[1];
			$arr = explode(".",$word); 
			$word=$arr[1];
		}
		$word=("第".$i."题          ".$word."");
		echo("<center><h2>第".$i."题");
		$key_file=($key_file.$word_key);	
		$speakword=($speakword.$word);	
		$speak_word=($word);	
		include("voice.php");
		echo('<li class="list-group-item"><br><audio src="./baidu_audio/audio_'.$voice_file.'.mp3" controls preload="none"></audio><br></div></li></center>');


    if($i==$i_){
        break;
    }
}
$voice_file=rand(1,99999999);
$speak_word=$speakword;
echo('<center><h2>完整的音频</h2><br><audio src="./baidu_audio/audio_'.$voice_file.'.mp3" controls preload="none"></audio><br></div></center>');
include("voice.php");

echo('
<!-- 按钮触发模态框 -->
&nbsp&nbsp
<center><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	查看答案
</button></center>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					答案
				</h4>
			</div>
			<div class="modal-body">
				'.$key_file.'
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
');
?>
</ul>
<br><small>*朗读技术支持：百度AI</small>