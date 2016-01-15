<?php
require "../support/constants.php";
query("DELETE from `b4026826_db1`.`orders`" . " where id=" . $_GET["g"]);

