<?php

require "../support/constants.php";
// rest code to get results from database
if (!isset($_GET["g"])) {
    $result = query("SELECT * FROM  `SumpGlass`");
    header("content-type: application/json");
    print json_encode($result);
} else {
    $result = query("SELECT Price FROM  `SumpGlass` WHERE Thickness = " . $_GET["g"]);
    header("content-type: application/json");
    print json_encode($result);
}
