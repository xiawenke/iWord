<?php
require_once './tools/baidu_face/AipFace.php';

// 定义常量
const APP_ID = '9872531';
const API_KEY = 'GGeypgX3jQ77fZ4cvWzwPCGw';
const SECRET_KEY = 'OQYEnon5XMM4jx7MalTo7t7qesBAOdfg';

// 初始化
$aipFace = new AipFace(APP_ID, API_KEY, SECRET_KEY);


//人脸删除
 var_dump($aipFace->deleteUser(
     'user7141330' //人脸ID
 ));