<?php

class Menu extends DatabaseBusiness {

    function __construct() {
        parent::__construct();

        $this->_table = "menu";
        $this->_primaryKey = "id";
    }

    function multiLevelMenu($parent) {
        try {
            $stmt = $this->_pdo->prepare("select * from menu where parent=? order by order_in_parent asc");
            $stmt->execute(array($parent));
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }

        if ($stmt->rowCount() > 0) {
            echo '<ul>';
            foreach ($stmt as $result) {
                //get children number, if children number > 0 then add classes needed
                try {
                    $stmt1 = $this->_pdo->prepare("select count(*) as children_number from menu where parent=?");
                    $stmt1->execute(array($result["id"]));
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                    exit();
                }

                $result1 = $stmt1->fetch();
                if ($result1["children_number"] == 0) {
                    echo '<li>';
                } else if ($result1["children_number"] > 0) {
                    echo '<li class="active deeper parent">';
                }

                echo '<a href="' . $result["url"] . '">' . $result["title"] . '</a>';
                $this->multiLevelMenu($result["id"]);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

}
