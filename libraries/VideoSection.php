<?php

class VideoSection extends DatabaseBusiness {

    function __construct() {
        parent::__construct();

        $this->_table = "photo_section";
        $this->_primaryKey = "id";
    }

    function selectAll() {
        try {
            $stmt = $this->_pdo->prepare("select * from video_section");
            $stmt->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit();
        }

        return $stmt->fetchAll();
    }

    function determineVideoHost($url) {
        $parsedUrl = parse_url($url);
        $class = "popup-youtube";
        if ($parsedUrl["host"] == "youtube.com" or $parsedUrl["host"] == "www.youtube.com") {
            $class = "popup-youtube";
        } else if ($parsedUrl["host"] == "vimeo.com" or $parsedUrl["host"] == "www.vimeo.com") {
            $class = "popup-vimeo";
        }

        return $class;
    }

}
