<?php
setcookie("user",null,time()+180);
echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>您已退出登录</strong>感谢使用！(退出若没有立即生效请点<a href="index.php">这里</a>！)</div>');
include("index.php");