<?php

require_once('../libraries/configs.php');
session_start();

$title = $_POST["support_section_title"];
$subtitle = $_POST["support_section_subtitle"];
$description = $_POST["support_section_description"];
$image = $_POST["support_section_image"];

try {
    $stmt = $pdo->prepare("insert into support_section values ('', ?, ?, ?, ?)");
    $stmt->execute(array($title, $subtitle, $description, $image));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=support_section");
