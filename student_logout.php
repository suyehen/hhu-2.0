<?php

    setcookie("flag", "false", time()+3600);
    setcookie("device_ID");
    echo "<script>window.location.href='index.php'; </script>";
?>