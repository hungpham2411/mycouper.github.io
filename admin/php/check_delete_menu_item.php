<?php

require_once('../../libraries/configs.php');
session_start();
$id = $_GET["id"];
try {
    $stmt = $pdo->prepare("select count(*) as children_number from menu where parent=?");
    $stmt->execute(array($id));
} catch (PDOException $ex) {
    echo $ex->getMessage();
    exit();
}

$childrenNumber = $stmt->fetch();
$check = false;
if ($childrenNumber["children_number"] == 0) {
    $check = true;
} else {
    $check = false;
}

echo json_encode(array("check" => $check));
