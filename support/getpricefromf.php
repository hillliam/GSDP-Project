<?php

require "../support/constants.php";
// rest code to get results from database
$result = query("SELECT Price FROM  `FrameOptions` WHERE Type = ". $_GET["f"]);
header("content-type: application/json");
print json_encode($result);

