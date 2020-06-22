<?php
	//声明图像格式
	//检查错误时可以注释掉首尾的图像生命，然后输出字符串来检查错误来源
	header('Content-type:image/jpeg');
	//创建图像，并设置验证码的长宽
	$width=100;
	$height=30;
	$element=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o',
	'p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
	//将string初始化，避免下一步会报错
	$captcha='';
	for($i=0;$i<4;$i++){
		//.表示连接字符
		$captcha .= $element[rand(0,count($element)-1)];
	}
	$img=imagecreatetruecolor($width,$height);
	//分配随机浅色颜色
	$colorBg=imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255));
	imagefill($img,0,0,$colorBg);
	//画100个像素点
	for($i=0;$i<100;$i++){
		imagesetpixel($img,rand(0,$width-1),rand(0,$height-1),
		imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));	
	}
	//画3条直线
	for($i=0;$i<3;$i++){
		imageline($img,rand(0,$width/3),rand(0,$height),rand($width/2,$width),
		rand(0,$height),imagecolorallocate($img,rand(100,200),rand(100,200),rand(100,200)));	
	}
	//写入文字
	$colorString=imagecolorallocate($img,rand(0,125),rand(0,125),rand(0,125));
	
	/* 	imagestring($img,5,0,0,$string,$colorString);
		使用默认字体输出文字
	*/
	//imagettftext的倒数第二个参数必须填入字体的绝对路径，因此使用dirname(__FILE__)来获取，此处有4个下划线
	$fontpath=dirname(__FILE__).'\font\Roland.ttf';
	imagettftext($img,25,rand(-10,10),rand(3,45),rand(20,25),$colorString,$fontpath,$captcha);
	//给生成的验证码生成一个cookie
	setcookie("captcha",$captcha,time()+3600);                

	//结束声明图像格式
	imagejpeg($img);
	
	?>



