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
			echo "window.location.href='index.php'; </script>";
		}	
	}

	//检查帐号是否正确
	$flag01=false;
    //获取index.php表单所提交的数据
	$stu_id = isset($_POST['username'])?$_POST['username']:"default";
	$password = isset($_POST['userpassword'])?$_POST['userpassword']:"default";
    //连接数据库username_password
	header('Content-type:text/html;charset=utf-8');
	$link=@mysqli_connect('localhost','root','Hejinxuan010859','',3306);
	if(mysqli_connect_errno()){
		exit(mysqli_connect_error());
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'username_password');
	//检查输入的学号是否存在
	$query='SELECT stu_id FROM student';
	mysqli_query($link,$query);
	$result=mysqli_query($link,$query);
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		//如果输入的学号存在
        if($stu_id==$row['stu_id']){
			$flag01=true;
			//检查密码是否正确
			$query='SELECT password FROM student where stu_id="'.$stu_id.'"';
			mysqli_query($link,$query);
			$result=mysqli_query($link,$query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if($row['password']==$password){
				//给学号设置一个cookie,为后面签到做准备
				setcookie("userid",$stu_id,time()+3600);
				//设置flag这个cookie，使得之后可以自动登录
				setcookie("flag", "true", time()+3600);

				//********************新增:姓名cookie,用于用户界面信息********************
				$query_name = 'SELECT * FROM student where stu_id="'.$stu_id.'"';
				mysqli_query($link,$query_name);
				$result_name=mysqli_query($link,$query_name);
				$name = mysqli_fetch_array($result_name, MYSQLI_ASSOC);
				setcookie("name", $name['name'], time()+3600);
				setcookie("tea_name_stu", $name['tea_name'], time()+3600);
				//**********************************************************************

	            mysqli_close($link);
				header("Location:student_page.php");
			}
			else{
				echo "密码错误，请重新输入";
			}
        }
	}
	if(!$flag01){
		echo "您输入的学号不存在，请重新输入";
	}
	mysqli_close($link);
?>
