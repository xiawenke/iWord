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
					单词本
				</h1>
				<p>
					据说啊，每次做了测试之后，会给按钮点击就可以记录单词……
				</p>               
			</div>
<?php
function get($text,$what){
    $pattern =  '/\<'.$what.'\>(.*?)\<\/'.$what.'\>/s';
    if(preg_match_all($pattern, $text, $matches)){  
        //print_r($matches);  
        $get=$matches[0][0];
     }else{  
        echo '';  
        $get="error(可能是没有单词)";
     }
     return($get);
}

function count_line($file){ 
    $fp=fopen($file, "r"); 
    $i=0; 
    while(!feof($fp)){ 
        if($data=fread($fp,1024*1024*2)){ 
            $num=substr_count($data,"\n"); 
            $i+=$num; 
        } 
    } 
    fclose($fp); 
    return $i; 
} 

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

if($_COOKIE['user']==""){
    echo('<div id="myAlert" class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>对不起</strong>您还没有登录！</div>');
    include("login.php");
    exit();
}

$user=$_COOKIE['user'];
$fp=fopen("./user/".$user,"r+");
$content=fread($fp,filesize("./user/".$user));
//echo($content);

$pattern =  '/\<note\>(.*?)\<\/note\>/s';
if(preg_match_all($pattern, $content, $matches)){  
    //print_r($matches);  
    //echo $matches[0][0];
 }else{  
    echo '';  
 }

$result = count ($matches[0]);
 $i=0;
 $document="";
 $result=$result-1;
 while($result>0){
     $i=$i+1;
     $result=$result-1;

     $text=$matches[0][$i];
     $date=get($text,'date');
     $mark=get($text,'mark');
     $bai=get($text,'bai');
     $word=get($text,'word');
     $n=get($text,'n');
     $rand=rand(1,5);
     $con="";
     if($rand==1){
         $con="panel panel-primary";
     }
     if($rand==2){
         $con="panel panel-success";
     }
     if($rand==3){
         $con="panel panel-info";
     }
     if($rand==4){
         $con="panel panel-warning";
     }
     if($rand==5){
         $con="panel panel-danger";
     }
     $out=('<div class="'.$con.'"><div class="panel-heading"><h3 class="panel-title">'.$date.'</h3><h4>正确率'.$mark.'得分'.$bai.'</div><div class="panel-body">'.$word.'<br>');
     echo $out;
     echo('<form action="space_del.php" method="GET"><input name="number" type="hidden" value="'.$n.'"><button type="button" class="btn btn-default" onclick="this.form.submit()">删除这一单词记录('.$n.')</button></form></div></div>');
     //echo '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">面板标题</h3></div><div class="panel-body">这是一个基本的面板</div></div>';
 }

 $text_=getLine("./user/".$user,1);
 if($text_==null){
     echo("<center><h1>没有单词</h1></center>");
 }
 else{
     
     $date=get($text_,'date');
     $mark=get($text_,'mark');
     $bai=get($text_,'bai');
     $word=get($text_,'word');
     $n=get($text_,'n');
     $rand=rand(1,5);
     $con="";
     if($rand==1){
         $con="panel panel-primary";
     }
     if($rand==2){
         $con="panel panel-success";
     }
     if($rand==3){
         $con="panel panel-info";
     }
     if($rand==4){
         $con="panel panel-warning";
     }
     if($rand==5){
         $con="panel panel-danger";
     }
     $out=('<div class="'.$con.'"><div class="panel-heading"><h3 class="panel-title">'.$date.'</h3><h4>正确率'.$mark.'得分'.$bai.'</div><div class="panel-body">'.$word.'<br>');
     echo $out;
     echo('<form action="space_del.php" method="GET"><input name="number" type="hidden" value="'.$n.'"><button type="button" class="btn btn-default" onclick="this.form.submit()">删除这一单词记录('.$n.')</button></form></div></div>');
     //echo '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">面板标题</h3></div><div class="panel-body">这是一个基本的面板</div></div>';
 }
?>