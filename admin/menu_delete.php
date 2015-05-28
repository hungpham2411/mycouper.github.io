<?php

require_once('../libraries/configs.php');
session_start();

$id = $_GET["id"];
try {
    $stmt = $pdo->prepare("select * from menu where id = ?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$menuItem = $stmt->fetch();
if ($menuItem["parent"] == 0) {
    $parentParam = "&parent=" . $menuItem["parent"];
} else {
    $parentParam = "";
}

try {
    $stmt = $pdo->prepare("delete from menu where id = ?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=menu" . $parentParam);
