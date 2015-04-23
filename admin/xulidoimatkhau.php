<?php

require_once('../libraries/configs.php');

session_start();

if(isset($_POST['security']) && $_POST['security'] == 1){

if (empty($_POST['old']) || empty($_POST['new']) || empty($_POST['repeat'])) {
        header('location: quanly.php?page=edit-my-password&action=lack-informations');
    }else{

    $username = $_SESSION['login_user'];

    $pass = $pdo->query("SELECT ad_Password FROM admins WHERE ad_Username='$username'");
    $pass = $pass->fetch();

    $old_password = $_POST['old'];
    $new_password = $_POST['new'];
    $repeat_password = $_POST['repeat'];

    if($old_password != $pass['ad_Password']){

         header('location: quanly.php?page=edit-my-password&action=password-wrong');

    }else if($repeat_password != $new_password){

         header('location: quanly.php?page=edit-my-password&action=repeat-password-wrong');

    }else if(($old_password == $pass['ad_Password']) && ($repeat_password == $new_password))
{
     $pdo->query("UPDATE admins SET ad_Password='$new_password' WHERE ad_Username='$username'");

     header('location: quanly.php?page=edit-my-password&action=success');

}

}

}

?>