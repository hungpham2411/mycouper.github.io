<?php
include_once('../libraries/configs.php');

session_start();

$id = $_REQUEST['id'];

$username = $_SESSION['login_user'];

$position = $pdo->query("SELECT ad_Permission FROM admins WHERE ad_Username='$username'");

$position = $position->fetch();

if($position['ad_Permission'] == "0" || $position['ad_Permission'] == "1"){

    header('location:  quanly.php?page=blog&action=failed');   

}else{
	$pdo->query("DELETE FROM blog WHERE bl_Id=".$_GET['id']."");
	header('location: quanly.php?page=blog&action=success');
}

?>