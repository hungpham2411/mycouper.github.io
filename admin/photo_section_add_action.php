<?php

require_once('../libraries/configs.php');
session_start();

$title = $_POST["photo_section_title"];
$allowedExtensions = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG");
$allowedFileSize = 1048576; //Byte
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$fileName = md5_file($_FILES["file"]["tmp_name"]);
$ok = 1; //$ok = 1 mean don't have error,  $ok = 0 mean have error
$errorMessage = array();

if (!in_array($extension, $allowedExtensions)) {
    $ok = 0;
    $errorMessage["fileFormatError"] = "File format invalid";
}

if ($_FILES["file"]["size"] > $allowedFileSize) {
    $ok = 0;
    $errorMessage["fileSizeError"] = "File size do not greater " . $allowedFileSize / 1024 . "KB";
}

if ($ok == 1 && $_FILES["file"]["error"] <= 0) {
    move_uploaded_file($_FILES['file']['tmp_name'], "../public/images/" . $fileName . "." . $extension);
} else {
    echo json_encode($errorMessage);
    exit();
}

try {
    $stmt = $pdo->prepare("insert into photo_section values ('', ?, ?)");
    $stmt->execute(array($title, $fileName . "." . $extension));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

header("location: quanly.php?page=photo_section");
