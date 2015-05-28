<?php

require 'DatabaseAdapter.php';

class DatabaseBusiness extends DatabaseAdapter {

    protected $_table = "";
    protected $_primaryKey = "";

    function __construct() {
        parent::connect();
    }

    function __destruct() {
        parent::disconnect();
    }

    function select($queryArray, $whereArray) {
        try {
            $stmt = $this->_pdo->prepare($queryArray["query"]);
            $stmt->execute($whereArray);
        } catch (PDOException $ex) {
            echo 'SQL query error in file ' . $queryArray["file"] . ' on line ' . $queryArray["line"] . '<br>';
            echo '<p><code>' . $queryArray["query"] . '</code></p>';
            echo $ex->getMessage();
            exit;
        }

        $result = $stmt->fetch();
        return $result;
    }

}
