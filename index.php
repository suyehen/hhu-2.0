<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>实践课程考勤系统</title>
		<link rel="stylesheet" href="css/login.css">
	</head>

<body style="background: url(img/login-bg.jpg) no-repeat;">
	<?php
		//设置一个cookie并默认值为false，即不允许自动登录
 		setcookie("flag", "false", time()+3600);
		//判断flag这个cookie是否存在且值为true，是则表示用户未登出，允许自动登录
		if(isset($_COOKIE['userid']) && ($_COOKIE['flag']=="true")){
			echo "<script>window.location.href='student_page.php'; </script>";

		}
	?>
	<form action="check_login_student.php" method="POST">
		<div class="bgstyle">
			<p class="logo01"><img src="img/sigang-login.png" /></p>
			<p class="text01">欢迎使用</p>
			<p class="text02">此为学生版入口，<br/>教师版入口请<a href="login_teacher.php">点击此处</a></p>
				<div class="text03">用户名:
					<input type="text" name="username" class="usrname" required>
				</div>
				<br/>
				<div class="text04">密&nbsp&nbsp&nbsp&nbsp码:
					<input type="password" name="userpassword" class="password" required>
					<br>
					验证码：<input type="text" name="captcha_input" class="captcha_input" style="width: 40px;">
					<!-- 此处的刷新需要仅仅刷新图片而不是整个页面 -->
					<img src='create_captcha.php' onclick="this.src=this.src+'?'+Math.random()" style="cursor: pointer;">
					<br><a style="font-size: 15px;">看不清楚？请点击图片刷新</a>	
				</div>

					
				<input type="submit" value="确定" class="submit"/>
				<a href="register_student.html" class="register1">没有帐号或忘</a>
				<br>
				<a href="register_student.html" class="register2">记密码?请点我</a>

		
		
		</div>
	</form>
		
		
		
		
		
		
		
		
		
		
		
	<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51011202000256" 
	style="display:inline-block;text-decoration:none;height:20px;line-height:20px;margin-top:100px;margin-left: 40%;">
		<img src="img/beian.png" style="float:left;"/>
		<p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">
			川公网安备 51011202000256号
		</p>
	</a>
		


</body>
</html>
