<?php

require_once('../libraries/configs.php');
session_start();

$menuTitle = $_POST["menu_title"];
$menuParent = $_POST["menu_parent"];
$menuOrderInParent = $_POST["menu_order_in_parent"];
$menuDescription = $_POST["menu_description"];
$menuUrl = $_POST["menu_url"];

try {
    $stmt = $pdo->prepare("insert into menu values('', '" . $menuTitle . "', '" . $menuParent . "', '" . $menuOrderInParent . "', '" . $menuDescription . "', '" . $menuUrl . "')");
    $stmt->execute();
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=menu&parent=" . $menuParent);
