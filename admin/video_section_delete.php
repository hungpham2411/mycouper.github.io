<?php

require_once('../libraries/configs.php');
session_start();

$id = $_GET["id"];

try {
    $stmt = $pdo->prepare("select * from video_section where id=?");
    $stmt->execute(array($id));
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

$result = $stmt->fetch();

unlink("../public/images/" . $result["preview_image"]);

try {
    $stmt = $pdo->prepare("delete from video_section where id=?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=video_section");
