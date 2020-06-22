<?php
	//获取验证码的输入
	$captcha_input = isset($_POST['captcha_input'])?$_POST['captcha_input']:"default";
	$captcha = $_COOKIE['captcha'];
	//验证码是否输入正确
	check_captcha($captcha,$captcha_input);
	function check_captcha($captcha,$captcha_input){
		if(!($captcha == $captcha_input)){	//如果验证码输入错误
			// echo "wrong";
			echo "<script type='text/javascript'>alert('验证码错误');";
			//此处跳回教师界面
			echo "window.location.href='login_teacher.php'; </script>";
		}	
	}

    //检查帐号是否正确

    //屏蔽变量$username的一个警告
    error_reporting(0);
	$flag01=false;
    //获取index.php表单所提交的数据
	$tea_username = isset($_POST['username'])?$_POST['username']:"default";
    $tea_password = isset($_POST['userpassword'])?$_POST['userpassword']:"default";
    //连接数据库username_password
	header('Content-type:text/html;charset=utf-8');
	$link=@mysqli_connect('localhost','root','Hejinxuan010859','',3306);
	if(mysqli_connect_errno()){
		exit(mysqli_connect_error());
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'username_password');
	//检查输入的教师帐号是否存在
	$query='SELECT tea_username FROM teacher';
	mysqli_query($link,$query);
	$result=mysqli_query($link,$query);
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		//如果输入的教师帐号存在
        if($row['tea_username'] == $tea_username){
			$flag01=true;
			//检查密码是否正确
			$query='SELECT tea_password,tea_name FROM teacher where tea_username="'.$tea_username.'"';
            mysqli_query($link,$query);
			$result=mysqli_query($link,$query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($row['tea_password']==$tea_password){
				//给教师姓名设置一个cookie,为后面签到做准备
                setcookie("tea_name",$row['tea_name'],time()+3600);
	            mysqli_close($link);
				header("Location:teacher_page.php");
			}
			else{
				echo "密码错误，请重新输入";
			}
        }
	}
	if(!$flag01){
		echo "您输入的帐号不存在，请重新输入";
		
	}




	mysqli_close($link);
?>
