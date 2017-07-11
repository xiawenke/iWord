
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <center><h3>错题： <span class="label label-default">点击题目展开详情</span></h3></center>

<div class="panel-group" id="accordion">
<?php
//error_reporting(E_ALL);  
error_reporting(E_ALL || ~E_NOTICE);
/**
Array ( [key_number] => 10 
[key1] => n.公鸡；雄禽；旋塞 
[key2] => n.对话，对白 
[key3] => vt.抑制，遏制；限制 
[key4] => n.拒绝 
[key5] => n.故事，小说，传说 
[key6] => vt.引用，引证；报价 
[key7] => a.富于幽默的，诙谐的 
[key8] => a.巧妙的；洒脱的 
[key9] => n.追逐，追赶，追求 
[key10] => n.磅；英磅 
**/
session_start();

//print_r($_SESSION['key']);
$key_number=$_SESSION['key'][0];
$i=0;
$mark=0;
$w_word=null;

while (1==1){
    $i=$i+1;
    if ($_GET[$i]==$_SESSION['key'][$i]){
        $mark=$mark+1;
    }
    else{
        $temp=rand(0,9999999);
        echo('<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#'.$temp.'">第'.$i.'题 '.$_SESSION['word'][$i].'</a></h4></div>');;
        echo '<div id="'.$temp.'" class="panel-collapse collapse"><div class="panel-body">';
        echo("单词：".$_SESSION['word'][$i]."<br>正确意思：".$_SESSION['key'][$i]."<br>你的错误选项：".$_GET[$i]);
        echo('<form action="dic_.php" method="GET"><input type="hidden" name="word" value="'.$_SESSION["word"][$i].'"><button type="button" class="btn btn-default" onclick="this.form.submit()">去查查词典看看详细意思~</button></form>');
        echo '</div></div></div>';
        $w_word=($w_word."<br>".$_SESSION['word'][$i]."---".$_SESSION['key'][$i]);
    }
    if ($i==$key_number){
        break;
    }
}
//echo ("<br>正确路率：".$mark."/".$key_number);
$bai=$mark/$key_number;
$bai=($bai*100);
echo('<div class="alert alert-info">共测试'.$key_number.'道题，正确'.$mark.'道，正确率'.$bai.'%</div>');

$date=date("Y-m-d,h:i:sa");
//mark
$w_mark=("<date>".$date."</date><mark>".$mark."/".$key_number."</mark><bai>".$bai."%</bai>");
$w_word=("<word>".$w_word."</word>");
if($_COOKIE['user']==""){
    echo('<div id="myAlert" class="alert alert-success"><a href="index.php" class="close" data-dismiss="alert">&times;</a><strong><a href="index.php">点击返回</a></strong>  (提示：可以登录，把每一次测试的错词记录下来！)</div>');
    exit();
}
else{
    echo('<form action="note.php" method="POST"><input type="hidden" name="mark" value="'.$w_mark.'"><input type="hidden" name="word" value="'.$w_word.'"><button type="button" class="btn btn-default" onclick="this.form.submit()">将错词添加到单词本</button></form>');
}

echo("<br><a href='index.php'>返回</a>");