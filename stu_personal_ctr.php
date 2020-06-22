<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="css/mainpage.css">
</head>
<body style="background-image: url(img/login-bg.jpg);">
<table class="table_usr_info" border="0" align="center" cellpadding="5" width="600">
    <?php
    $stu_id = isset($_COOKIE['userid'])?$_COOKIE['userid']:"default";
    $name = isset($_COOKIE['name'])?$_COOKIE['name']:"default";
    $tea_name = isset($_COOKIE['tea_name_stu'])?$_COOKIE['tea_name_stu']:"undefined";
    echo " <tr><td>用户学号:</td> <td> $stu_id </td></tr> ";
    echo " <tr><td>用户姓名:</td> <td>$name</td></tr>";
    echo " <tr><td>所选教师:</td> <td>$tea_name</td></tr>";
    echo " <tr><td>&nbsp</td></tr>";
    echo " <tr><td><a href=\"student_page.php\"> 返回学生界面</a> </td><td><a href=\"index.php\"> 退出帐号</a> </td></tr>"
    ?>
</table>
</body>
</html>