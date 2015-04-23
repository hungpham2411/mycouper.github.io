<?php
include_once('../libraries/configs.php');

session_start();

$id = $_REQUEST['id'];

$username = $_SESSION['login_user'];

$position = $pdo->query("SELECT ad_Permission FROM admins WHERE ad_Username='$username'");

$position = $position->fetch();

if($position['ad_Permission'] == "0" || $position['ad_Permission'] == "1"){

    header('location:  quanly.php?page=categories&action=failed');   

}else{

	$usefor = $pdo->query("SELECT COUNT(ar_Category) FROM articles WHERE ar_Category=".$_GET['id']."");
	$usefor = $usefor->fetch();
	
	if($usefor[0] > 0)
	{
		$pdo->query("DELETE FROM articles  WHERE ar_Category='$id'");
		$pdo->query("DELETE FROM categories  WHERE cate_Id='$id'");
		header('location:  quanly.php?page=categories&action=success');
	}else{
		$pdo->query("DELETE FROM categories  WHERE cate_Id='$id'");
		header('location:  quanly.php?page=categories&action=success');
	}

}

?>