<?php

require_once('../libraries/configs.php');
session_start();

$id = $_REQUEST["id"];
$title = $_POST["support_section_title"];
$subtitle = $_POST["support_section_subtitle"];
$description = $_POST["support_section_description"];
$image = $_POST["support_section_image"];

try {
    $stmt = $pdo->prepare("update support_section set title=?, subtitle=?, description=?, image=? where id=?");
    $stmt->execute(array($title, $subtitle, $description, $image, $id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=support_section");
