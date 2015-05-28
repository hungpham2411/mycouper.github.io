<?php

class DatabaseAdapter {

    protected $_pdo;

    function connect() {
        if (!$this->_pdo) {
            try {
                $this->_pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USERNAME, PASSWORD);
                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->_pdo->exec("SET CHARACTER SET utf8");

                $this->_pdo->exec("set character_set_client='utf8'");
                $this->_pdo->exec("SET character_set_results='utf8'");
                $this->_pdo->exec("SET collation_connection='utf8_general_ci'");
            } catch (PDOException $e) {
                echo "Đã xảy ra lỗi kết nối: \n" . $e->getMessage() . "\n";
                exit;
            }
        }
    }

    function disconnect() {
        $this->_pdo = null;
    }

}
