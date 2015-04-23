<?php
/**
 * Created by PhpStorm.
 * User: QUY
 * Date: 15/09/2014
 * Time: 16:35
 */
define('PATH','http://techchannel24h.com/website-demo/oracle-anh-quang');

try{
    $pdo= new PDO("mysql:host=localhost;dbname=tcn24h_mycouper","tcn24h_mycouper","123456");
    $pdo->exec("SET CHARACTER SET utf8");

    $pdo->exec("set character_set_client='utf8'");
    $pdo->exec("SET character_set_results='utf8'");
    $pdo->exec("SET collation_connection='utf8_general_ci'");

    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

}catch(PDOException $e){
    echo "Đã xảy ra lỗi kết nối: \n" . $e->getMessage(). "\n";
    exit;
}
$connection = mysqli_connect("localhost","tcn24h_mycouper","123456","tcn24h_mycouper") or die ("Không thể kết nối tới cơ sở dữ liệu !");
$connection->set_charset('utf8');
