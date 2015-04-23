<?php

/**
 * Created by PhpStorm.
 * User: QUY
 * Date: 15/09/2014
 * Time: 16:35
 */
define('PATH', 'http://localhost/mycouper.github.io');

try {
    $pdo = new PDO("mysql:host=localhost;dbname=tcn24h_mycouper", "root", "");
    $pdo->exec("SET CHARACTER SET utf8");

    $pdo->exec("set character_set_client='utf8'");
    $pdo->exec("SET character_set_results='utf8'");
    $pdo->exec("SET collation_connection='utf8_general_ci'");

    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
} catch (PDOException $e) {
    echo "Đã xảy ra lỗi kết nối: \n" . $e->getMessage() . "\n";
    exit;
}
$connection = mysqli_connect("localhost", "root", "", "tcn24h_mycouper") or die("Không thể kết nối tới cơ sở dữ liệu !");
$connection->set_charset('utf8');
