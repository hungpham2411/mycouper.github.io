<?php

require_once('../libraries/configs.php');

$id = $_REQUEST['id'];

$man = $pdo->query("SELECT * FROM admins WHERE ad_Id='$id'");
foreach($man as $show){

if($show['ad_Username'] == "admin" || $show['ad_Id'] == 1)
{

header('location: quanly.php?page=staff&action=failed');

}else{

$pdo->query("DELETE FROM admins WHERE ad_Id='$id'");

header('location: quanly.php?page=staff&action=success');

}

}

?>