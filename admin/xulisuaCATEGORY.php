<?php

include_once('../libraries/configs.php');

if(isset($_POST['security']) && $_POST['security'] == 2)
{

	$id = $_POST['id'];
   $title = $_POST['title'];

$pdo->query("UPDATE categories SET cate_Name='$title' WHERE cate_Id='$id'");

header('location: quanly.php?page=categories&action=success');
	
}

if(isset($_POST['security']) && $_POST['security'] == 1)
{

	$id = $_POST['id'];
   $title = $_POST['title'];
   $description= $_POST['description'];
   $logo = $_POST['logo'];

$pdo->query("UPDATE categories SET cate_Name='$title',cate_Description='$description',cate_Logo='$logo' WHERE cate_Id='$id'");

header('location: quanly.php?page=add_category&action=success');
	
}

?>