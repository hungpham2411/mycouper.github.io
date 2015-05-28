<?php

//Path
define('PATH', 'http://techchannel24h.com/website-demo/oracle-anh-quang');
define("IMG_PATH", PATH . "/public/images");

//Database
define("HOST", "localhost");
define("USERNAME", "tcn24h_mycouper");
define("PASSWORD", "123456");
define("DB_NAME", "tcn24h_mycouper");

//Mail configuration
define("SMTP_HOST", "smtp.pangia.biz"); // smtp server
define("SMTP_PORT", 587); // set the smtp port for the smtp server
define("SMTP_USERNAME", "support@mycouper.com"); // smtp username
define("SMTP_PASSWORD", "support123"); //smtp password

try {
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USERNAME, PASSWORD);
    $pdo->exec("SET CHARACTER SET utf8");

    $pdo->exec("set character_set_client='utf8'");
    $pdo->exec("SET character_set_results='utf8'");
    $pdo->exec("SET collation_connection='utf8_general_ci'");
} catch (PDOException $e) {
    echo "Đã xảy ra lỗi kết nối: \n" . $e->getMessage() . "\n";
    exit;
}
$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME) or die("Không thể kết nối tới cơ sở dữ liệu !");
$connection->set_charset('utf8');
