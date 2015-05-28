<?php

class SupportSection extends DatabaseBusiness {

    function __construct() {
        parent::__construct();

        $this->_table = "support_section";
        $this->_primaryKey = "id";
    }

    function selectAll() {
        try {
            $stmt = $this->_pdo->prepare("select * from support_section");
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }

        return $stmt->fetchAll();
    }

}
