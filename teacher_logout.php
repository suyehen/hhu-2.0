<?php

    setcookie("flag01", "false", time()+3600);
    echo "<script>window.location.href='login_teacher.php'; </script>";
?>