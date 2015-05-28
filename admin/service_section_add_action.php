<?php

require_once('../libraries/configs.php');
session_start();

$title = $_POST["service_section_title"];
$subtitle = $_POST["service_section_subtitle"];
$description = $_POST["service_section_description"];
$image = $_POST["service_section_image"];

try {
    $stmt = $pdo->prepare("insert into service_section values ('', ?, ?, ?, ?)");
    $stmt->execute(array($title, $subtitle, $description, $image));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=service_section");
