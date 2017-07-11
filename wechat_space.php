<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

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
     echo('<form action="wechat_space_del.php" method="GET"><input name="number" type="hidden" value="'.$n.'"><button type="button" class="btn btn-default" onclick="this.form.submit()">删除这一单词记录('.$n.')</button></form></div></div>');
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
     echo('<form action="wechat_space_del.php" method="GET"><input name="number" type="hidden" value="'.$n.'"><button type="button" class="btn btn-default" onclick="this.form.submit()">删除这一单词记录('.$n.')</button></form></div></div>');
     //echo '<div class="panel panel-success"><div class="panel-heading"><h3 class="panel-title">面板标题</h3></div><div class="panel-body">这是一个基本的面板</div></div>';
 }
?>
<br><br><br>