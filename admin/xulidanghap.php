<?php
require_once('../libraries/configs.php');
session_start();
$error='';
if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Tài khoản hoặc mật khẩu không được để trống !";
    }
    else
    {
        $query = mysqli_query($connection,"SELECT * FROM admins WHERE ad_Password='".$_POST['password']."' AND ad_Username='".$_POST['username']."'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            $sql = $pdo->query("SELECT * FROM admins WHERE ad_Password='".$_POST['password']."' AND ad_Username='".$_POST['username']."'");
            $sql = $sql->fetch();
            if($sql['ad_Permission'] != 0)
            {
                $_SESSION['login_user']=$_POST['username'];
            $_SESSION['position']=$sql['ad_Permission'];
            header("location: quanly.php?page=my-informations");
            }else{
                $error = "Tài khoản này bị khoá !";
            }
        } else {
            $error = "Tài khoản hoặc mật khẩu không đúng !";
        }
        mysqli_close($connection);
    }
}
?>