<?php 

require_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 2)
{
	$pdo->query("UPDATE vip_link SET vl_Link='".$_POST['description']."',vl_Picture='".$_POST['picture']."',vl_IsShow='".$_POST['rdo']."' WHERE vl_Id='".$_POST['id']."'");
	header('location: quanly.php?page=vip_link&id='.$_POST['vip_id'].'&action=success');
}

?>