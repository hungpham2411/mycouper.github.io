<?php

class ServiceSection extends DatabaseBusiness {

    function __construct() {
        parent::__construct();

        $this->_table = "photo_section";
        $this->_primaryKey = "id";
    }

    function selectAll() {
        try {
            $stmt = $this->_pdo->prepare("select * from service_section");
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }

        return $stmt->fetchAll();
    }

}
