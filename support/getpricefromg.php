<?php

require "../support/constants.php";
// rest code to get results from database
$result = query("SELECT Price FROM  `GlassPrices` WHERE Thickness = ". $_GET["g"]);
header("content-type: application/json");
print json_encode($result);

