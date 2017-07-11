<?php
setcookie("user",null,time()+180);
echo('<div id="myAlert" class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>您已退出登录</strong>感谢使用！</div>');
echo('<meta http-equiv="refresh" content="0;url=wx/index.php">');