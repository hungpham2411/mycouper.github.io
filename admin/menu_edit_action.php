<?php

require_once('../libraries/configs.php');
session_start();

$id = $_REQUEST["id"];
$menuTitle = $_POST["menu_title"];
$menuParent = $_POST["menu_parent"];
$menuOrderInParent = $_POST["menu_order_in_parent"];
$menuDescription = $_POST["menu_description"];
$menuUrl = $_POST["menu_url"];

try {
    $stmt = $pdo->prepare("update menu set title = '" . $menuTitle . "', parent = '" . $menuParent . "', order_in_parent = '" . $menuOrderInParent . "', description = '" . $menuDescription . "', url = '" . $menuUrl . "' where id = ?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=menu&parent=" . $menuParent);
