<?php

@$trang = $_GET["trang"];
switch ($trang) {
//trang chủ//
    case "trangchu":
        $noidungtrang[] = "home.php";
        break;
//trang blog//
    case "blog":
        $noidungtrang[] = "blog.php";
        break;
//trang chi tiết blog//
    case "blog-detail":
        $noidungtrang[] = "blog-detail.php";
        break;
//trang mặc định//
    default:
        $noidungtrang[] = "home.php";
}
require("template.php");
?>