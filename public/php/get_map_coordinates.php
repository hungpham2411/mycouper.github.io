<?php

// include config to connect to database
// include_once '';
// get coordinates from database and push to array
$coordinates = array("lat" => 21.018346, "lon" => 105.847628);
echo json_encode($coordinates);
