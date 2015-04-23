<?php

if(isset($_GET['btnSearchStaff'])){

    $staff = $_GET['txtSearch'];
    header('location: quanly.php?page=staff&search='.$staff);

}
if(isset($_GET['btnSearchCategory'])){

    $slideshow = $_GET['txtSearch'];
    header('location: quanly.php?page=categories&search='.$slideshow);

}
if(isset($_GET['btnSearchProducts'])){

    $products = $_GET['txtSearch'];
    header('location: quanly.php?page=products&search='.$products);

}
if(isset($_GET['btnSearchServices'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=articles&id='.$_GET['id'].'&search='.$project);

}
if(isset($_GET['btnSearchBlogCategories'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=blog_categories&search='.$project);

}
if(isset($_GET['btnSearchBlog'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=blog&search='.$project);

}
if(isset($_GET['btnSearchTags'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=tags&search='.$project);

}
if(isset($_GET['btnSearchPartners'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=partners&search='.$project);

}
if(isset($_GET['btnSearchFeedback'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=feedback&search='.$project);

}
if(isset($_GET['btnSearchVip'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=vip&search='.$project);

}
if(isset($_GET['btnSearchVipLink'])){

    $project = $_GET['txtSearch'];
    header('location: quanly.php?page=vip_link&id='.$_GET['txtSearch1'].'&search='.$project);

}
?>