<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="css/mainpage.css">
</head>
<body style="background-image: url(img/login-bg.jpg);">
<table class="table_usr_info" border="1" align="center" cellpadding="10" width="600">
    <?php
    $tea_name = isset($_COOKIE['tea_name'])?$_COOKIE['tea_name']:"default";
    echo " <tr><td>当前用户</td> <td> $tea_name <a href=\"login_teacher.php\"> 退出</a></td></tr> ";
    ?>
</table>
</body>
</html>