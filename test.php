<?php
	//����Session
	session_start();
	//�ж��Ƿ��ύ
	if(isset($_POST['dosubmit'])){
		//��ȡsession�е���֤�벢תΪСд
		$sessionCode=strtolower($_SESSION['code']);
		//��ȡ�������֤��
		$code=strtolower($_POST['code']);
		//�ж��Ƿ����
		if($sessionCode==$code){
			echo "<script type='text/javascript'>alert('��֤����ȷ!');</script>";
		}else{
			echo "<script type='text/javascript'>alert('��֤�����!');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<style type="text/css">
			*{margin:0px;padding:0px;}
			ul{
				width:400px;
				list-style:none;
				margin:50px auto;
			}
			
			li{
				padding:12px;
				position:relative;
			}
			
			label{
				width:80px;
				display:inline-block;
				float:left;
				line-height:30px;
			}
			
			input[type='text'],input[type='password']{
				height:30px;
			}
			
			img{
				margin-left:10px;
			}
			
			input[type="submit"]{
				margin-left:80px;
				padding:5px 10px;
			}
		</style>
	</head>
	<body>
		<form action="login.php" method="post">
			<ul>
				<li>
					<label>�û�����</label>
					<input type="text" name="username"/>
				</li>
				<li>
					<label>���룺</label>
					<input type="password" name="password"/>
				</li>
				<li>
					<label>��֤�룺</label>
					<input type="text" name="code" size="4" style="float:left"/>
					<img src="image_002.php" onclick="this.src='image_002.php?Math.random()'"/>
				</li>
				<li>
					<input type="submit" value="��¼" name="dosubmit"/>
				</li>
			</ul>
		</form>
	</body>
</html>