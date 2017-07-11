<html>
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
session_start();
$db_file='./db/dic.db';
$line = count(file($db_file));   

$i=0;

setcookie("key_number", $i_, time()+3600);
$g_key[0]=$i_;
$g_word[0]=$i_;

while(1==1){
    $rand=rand(0,6);
    $con="";
    if($rand==0){
        $con="panel panel-primary";
    }
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
    if($rand==6){
        $con="panel panel-danger";
    }
    echo ('<div class="'.$con.'"><div class="panel-heading"><form action="key.php" method="GET">');
    $i=$i+1;
    $rand=rand(1,$line);
    echo("[".$rand."]");
    $word_=getLine($db_file,$rand);
    //echo $word_;
    $arr = explode(" ",$word_); 
    //print_r($arr);
    $word=$arr[0];
    $key=$arr[1];
    echo ('<h3 class="panel-title">'.$word);
    echo "</h3></div>";

    //记录答案。
    $g_key[$i]=$key;
    $g_word[$i]=$word;
    setcookie($i, $key, time()+3600);

    $rand1=rand(0,$line);
    $rand1_=getLine($db_file,$rand1);
    $rand1=explode(" ",$rand1_);
    $rand1=$rand1[1];

    $rand2=rand(0,$line);
    $rand2_=getLine($db_file,$rand2);
    $rand2=explode(" ",$rand2_);
    $rand2=$rand2[1];

    $rand3=rand(0,$line);
    $rand3_=getLine($db_file,$rand3);
    $rand3=explode(" ",$rand3_);
    $rand3=$rand3[1];

    $rand4=$key;
    $way=rand(1,4);
    $way1=("<div class='panel-body'><br><input type='radio' name='".$i."' value='".$rand1."'>".$rand1."<br><input type='radio' name='".$i."' value='".$rand2."'>".$rand2."<br><input type='radio' name='".$i."' value='".$rand3."'>".$rand3."<br><input type='radio' name='".$i."' value='".$rand4."'>".$rand4."<br><input type='radio' name='".$i."' value='不知道'>啊…我不知道<br></div></div>");
    $way2=("<div class='panel-body'><br><input type='radio' name='".$i."' value='".$rand2."'>".$rand2."<br><input type='radio' name='".$i."' value='".$rand3."'>".$rand1."<br><input type='radio' name='".$i."' value='".$rand4."'>".$rand4."<br><input type='radio' name='".$i."' value='".$rand3."'>".$rand3."<br><input type='radio' name='".$i."' value='不知道'>啊…我不知道<br></div></div>");
    $way3=("<div class='panel-body'><br><input type='radio' name='".$i."' value='".$rand3."'>".$rand3."<br><input type='radio' name='".$i."' value='".$rand4."'>".$rand4."<br><input type='radio' name='".$i."' value='".$rand1."'>".$rand1."<br><input type='radio' name='".$i."' value='".$rand2."'>".$rand2."<br><input type='radio' name='".$i."' value='不知道'>啊…我不知道<br></div></div>");
    $way4=("<div class='panel-body'><br><input type='radio' name='".$i."' value='".$rand4."'>".$rand4."<br><input type='radio' name='".$i."' value='".$rand1."'>".$rand3."<br><input type='radio' name='".$i."' value='".$rand2."'>".$rand2."<br><input type='radio' name='".$i."' value='".$rand1."'>".$rand1."<br><input type='radio' name='".$i."' value='不知道'>啊…我不知道<br></div></div>");
    if ($way==1){
        echo $way1;
    }
    if ($way==2){
        echo $way2;
    }
    if ($way==3){
        echo $way3;
    }
    if ($way==4){
        echo $way4;
    }

    if($i==$i_){
        break;
    }
}

echo '<br><input type="submit" value"Sublit" id="sub">';
$fp=fopen($db_file,"r+");
$word_db=fwrite($fp,filesize($db_file));

//Session_Register("key");
//Session_Register("word");
$_SESSION["key"]=$g_key;
$_SESSION["word"]=$g_word;

//print_r($_COOKIE);
?>