<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php


$number=$_GET['number'];
echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>已删除</strong>删除后不能再次恢复！(删除若没有立即生效请点<a href="space.php">这里</a>)。</div>');
include('space.php');


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

$line='';

$result = count ($matches[0]);
 $i=0;
 $document="";
 $result=$result-1;
 while($result>0){
     $i=$i+1;
     $result=$result-1;

     $text=$matches[0][$i];
     $n=get($text,'n');
     if($n==$number){
         $line=($i);
         break;
     }
}
$i=0;
$file_del=null;
while(1==1){
    $i=$i+1;
    if(getLine("./user/".$user,$i)==""){
        break;
    }
    $t=getLine("./user/".$user,$i);
    if($number==get($t,"n")){
        $t="";
    }
    else{
        $t=("\n".$t);
    }
    $file_del=($file_del.$t);
}
file_put_contents("./user/".$user,$file_del);
