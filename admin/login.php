<?php
include_once('../libraries/configs.php');
include_once('xulidanghap.php');
?>
<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width" />
    <title>Đăng nhập hệ thống</title>
    <link href="css/Login.css" rel="stylesheet" />
</head>
<body>
<form method="post" action="">
<div class="login">
    <div class="bao_text">

        <div class="dynamiclabel">
            <input id="username" name="username" placeholder="Tài khoản ..." type="text">&nbsp;<a style="color:white;">(*)</a>
        </div>
        <div class="dynamiclabel">
            <input id="password" name="password" placeholder="Mật khẩu ..." type="password">&nbsp;<a style="color:white;">(*)</a>
        </div>
    </div>
    <div class="Bao_btn">
        <!-- <center> <a href="Home.html" class="btn1">Login</a></center> -->
        <center><input type="submit" id="login" name="login" value="Đăng nhập" class="btn1" /></center>
        <br />
        <span style="color: white;font-size: 11px;"><?php echo $error; ?></span>
    </div>
</div>
</form>
</body>
</html>