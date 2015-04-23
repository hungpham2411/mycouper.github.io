<?php 

require_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 1)
{
	$now = getdate();
	$posttime = $now["mday"]."/".$now["mon"]."/".$now["year"];
	
	$pdo->query("INSERT INTO feedback(fb_Name,fb_Position,fb_Content,fb_PostTime,fb_IsShow) VALUES('".$_POST['name']."','".$_POST['address']."','".$_POST['description']."','$posttime','".$_POST['rdo']."')");
	header('location: quanly.php?page=feedback&action=success');
}

?>