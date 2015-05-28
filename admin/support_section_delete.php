<?php

require_once('../libraries/configs.php');
session_start();

$id = $_GET["id"];

try {
    $stmt = $pdo->prepare("delete from support_section where id=?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=support_section");
