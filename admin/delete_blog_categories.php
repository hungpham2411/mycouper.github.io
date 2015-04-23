<?php
include_once('../libraries/configs.php');

session_start();

$id = $_REQUEST['id'];

$username = $_SESSION['login_user'];

$position = $pdo->query("SELECT ad_Permission FROM admins WHERE ad_Username='$username'");

$position = $position->fetch();

if($position['ad_Permission'] == "0" || $position['ad_Permission'] == "1"){

    header('location:  quanly.php?page=blog_categories&action=failed');   

}else{
	$checkId = $pdo->query("SELECT COUNT(bl_Category) AS totalID FROM blog WHERE bl_Category='".$_GET['id']."'");
	$checkId = $checkId->fetch();
	if($checkId['totalID'] > 0)
	{
		$pdo->query("DELETE FROM blog WHERE bl_Category=".$_GET['id']."");
		$pdo->query("DELETE FROM blog_categories WHERE bc_Id=".$_GET['id']."");
		header('location: quanly.php?page=blog_categories&action=success');
	}else{
		$pdo->query("DELETE FROM blog_categories WHERE bc_Id=".$_GET['id']."");
		header('location: quanly.php?page=blog_categories&action=success');
	}
}

?>