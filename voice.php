<?php
// 引入Speech SDK
require_once './tools/baidu_AipSpeech/AipSpeech.php';

// 定义常量
const APP_ID = '';
const API_KEY = '';
const SECRET_KEY = '';

// 初始化AipSpeech对象
$aipSpeech = new AipSpeech(APP_ID, API_KEY, SECRET_KEY);

if (isset($voice_type)) {
    //233
}
else{
    $voice_type='1';
}

$result = $aipSpeech->synthesis($speak_word, 'zh', 1, array(
    'vol' => 3,
    'spd' => 4,
    'per' => $voice_type
));

if (isset($voice_file)) {
    $file_name=$voice_file;
}
else{
    $file_name=$speak_word;
}

// 识别正确返回语音二进制 错误则返回json 参照下面错误码
if(!is_array($result)){
    file_put_contents('./baidu_audio/audio_'.$file_name.'.mp3', $result);
}
