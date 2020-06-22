<?php 
//获取验证码的输入
$captcha_input = isset($_POST['captcha_input'])?$_POST['captcha_input']:"default";
$captcha = $_COOKIE['captcha'];
check_captcha($captcha,$captcha_input);
//验证码是否输入正确
function check_captcha($captcha,$captcha_input){
    if($captcha == $captcha_input){
        echo "right";
        
    }
    else{
        echo "wrong";			
    }
    
    
}

?>