<?php 

require_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 1)
{
	$pdo->query("INSERT INTO vip_link(vl_Link,vl_Picture,vl_IsShow,vl_Vip) VALUES('".$_POST['description']."','".$_POST['picture']."','".$_POST['rdo']."','".$_POST['vip_id']."')");
	header('location: quanly.php?page=vip_link&id='.$_POST['vip_id'].'&action=success');
}

?>