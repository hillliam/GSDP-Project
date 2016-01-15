<?php
require "../support/constants.php";
query("UPDATE `b4026826_db1`.`orders`" . " SET  `compleated` =  '1'" . " where id=" . $_GET["g"]);

