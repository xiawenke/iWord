<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
$word=$_GET['word'];
$url=("http://dict.bigear.cn/w/".$word);
$contents = file_get_contents($url); 

$pattern =  '/\<span class="phon"\>(.*?)\<\/span\>/s';
if(preg_match_all($pattern, $contents, $matches)){  
    //print_r($matches);  
    $phon=$matches[0][0];
 }else{  
    $phon='无音标';  
 }

echo('<div class="well well-lg"><h1>'.$word.'</h1><span class="label label-default">来源:'.$url.'</span></div>');
echo('<div class="well well-sm"><u>音标及朗读</u><br>'.$phon.'<br><audio src="./baidu_audio/audio_'.$word.'.mp3" controls preload="none"></audio><br><small>（朗读技术支持：百度AI）</small><br></div>');

//如果出现中文乱码使用下面代码 
//$getcontent = iconv("gb2312", "utf-8",$contents); 
//echo $contents; 
echo '<div class="well well-sm"><u>解释</u>';
$pattern =  '/\<div class="mean"\>(.*?)\<\/div\>/s';
if(preg_match_all($pattern, $contents, $matches)){  
    //print_r($matches);  
    echo $matches[0][0];
 }else{  
    echo '无';  
 }
 echo '</div>';

echo '<div class="well well-sm"><u>时态</u>';
$pattern =  '/\<div class="wordform"\>(.*?)\<\/div\>/s';
if(preg_match_all($pattern, $contents, $matches)){  
    //print_r($matches);  
    echo $matches[0][0];
 }else{  
    echo '无';  
 }
 echo '</div>';

 echo '<div class="well well-sm"><u>英英解释及例句</u>';
$pattern =  '/\<div class="liright fr"\>(.*?)\<\/div\>/s';
if(preg_match_all($pattern, $contents, $matches)){  
    //print_r($matches);  
    echo $matches[0][1];
 }else{  
    echo '无';  
 }
$result = count ($matches[0]);
 $i=0;
 $document="";
 $result=$result-1;
 while($result>0){
     $i=$i+1;
     $result=$result-1;
     echo $matches[0][$i];
 }
  echo '</div>';
  $speak_word=$word;
  include("voice.php");
?>

<a href="javascript :;" onClick="javascript :history.back(-1);">返回上一页</a><br><br><br><br>