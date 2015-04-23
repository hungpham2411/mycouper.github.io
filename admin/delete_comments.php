<?php
include_once('../libraries/configs.php');

session_start();

$id = $_REQUEST['id'];

$username = $_SESSION['login_user'];

$position = $pdo->query("SELECT ad_Permission FROM admins WHERE ad_Username='$username'");

$position = $position->fetch();

if($position['ad_Permission'] != "2"){

    header('location:  quanly.php?page=comments&action=failed');   

}else{

    $pdo->query("DELETE FROM contact WHERE co_Id='$id'");

    header('location:  quanly.php?page=comments&action=success');

}

?>