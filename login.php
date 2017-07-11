<html>
<head>
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
	<title>Login</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>

<body>
<center>
<div class="jumbotron">
                
				<h1>
					登陆
				</h1>
				<p>
					据说啊，登陆了就可以把每一次测试的成绩和错词记录下来了……
				</p>
                <code>输入用户名，没有注册过将会自动注册并登录，以后再次登陆请使用相同的用户名。</code>
                
			</div>

<div class="row" >
  <div class="col-xs-6 col-md-offset-3" 
     style="box-shadow: 
     inset 1px -1px 1px #444,">



<div class="well well-lg"><h2>传统登陆</h2>
<form class="bs-example bs-example-form" role="form" action="login_.php" method="POST">
    <div class="input-group">
        <span class="input-group-addon">用户名</span>
        <input name="user" type="text" class="form-control" placeholder="User Name">
    </div>
    <br><button type="button" class="btn btn-default" onclick="this.form.submit()">    登 陆    </button>
</div></form>

<div class="well well-lg"><h2>刷脸登陆</h2>
<form class="bs-example bs-example-form" role="form" action="login_.php" method="POST" enctype="multipart/form-data">
    <div class="input-group">
        <span class="input-group-addon">上传只有自己一个人的照片</span>
        <input name="file" type="file" class="form-control" placeholder="photo">
		<input name="page" type="hidden" class="form-control" value="face">
		<code>免责声明：本网站绝对不会保存您的照片，保存人像参数由百度AI负责，与本站无关！</code>
		<br><code>技术支持：百度AI</code>
    </div>
	<a href="register_face.php">第一次使用人脸登陆？先注册人脸</a>

	<br><button id="fat-btn" onclick="this.form.submit()" class="btn btn-primary" data-loading-text="正在处理……" 
    type="button"> 登陆
</button>
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
</div></form>

  </div>
</div>
</center>