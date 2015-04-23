<?php 

require_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 2)
{	
	$pdo->query("UPDATE feedback SET fb_Name='".$_POST['name']."',fb_Position='".$_POST['address']."',fb_Content='".$_POST['description']."',fb_IsShow='".$_POST['rdo']."' WHERE fb_Id='".$_POST['id']."'");
	header('location: quanly.php?page=feedback&action=success');
}

?>