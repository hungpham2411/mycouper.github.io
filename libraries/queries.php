<?php

require_once ('configs.php');

$options = $pdo->query("SELECT * FROM options");
$options = $options->fetch();

$articles = $pdo->query("SELECT * FROM articles WHERE ar_Category=1 AND ar_IsShow=1");

$articles1 = $pdo->query("SELECT * FROM articles WHERE ar_Category=2 AND ar_IsShow=1");

$partners = $pdo->query("SELECT * FROM partners WHERE pa_IsShow=1");

$about_us = $pdo->query("SELECT * FROM about_us");
$about_us = $about_us->fetch();

$feedback = $pdo->query("SELECT * FROM feedback WHERE fb_IsShow=1");

$vip = $pdo->query("SELECT * FROM vip WHERE vi_IsShow=1");

$slideshow = $pdo->query("SELECT * FROM slideshow WHERE ss_IsShow=1");
$slideshow = $slideshow->fetch();

$categories = $pdo->query("SELECT * FROM categories WHERE cate_UseFor=1");
foreach($categories as $show_categories)
{
	if($show_categories['cate_Id'] == 1)
	{
		$category_title1 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 2)
	{
		$category_title2 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 3)
	{
		$category_title3 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 4)
	{
		$category_title4 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 5)
	{
		$category_title5 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 6)
	{
		$category_title6 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 7)
	{
		$category_title7 = $show_categories['cate_Name'];
	}elseif($show_categories['cate_Id'] == 8)
	{
		$category_title8 = $show_categories['cate_Name'];
	}
}

$categories2 = $pdo->query("SELECT * FROM categories WHERE cate_UseFor=2");

if(isset($_GET['flag']) && ($_GET['flag'] == 2 || $_GET['flag'] == 3))
{
	$blog_categories = $pdo->query("SELECT * FROM blog_categories WHERE bc_IsShow=1");
	$blog_tags = $pdo->query("SELECT * FROM tags");
	$recent_post = $pdo->query("SELECT * FROM blog WHERE bl_IsShow=1 ORDER BY bl_Id DESC LIMIT 6");
}

?>