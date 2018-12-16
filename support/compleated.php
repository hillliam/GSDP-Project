<?php
require "../support/constants.php";
query("UPDATE orders" . " SET  compleated =  '1'" . " where id=" . $_GET["g"]);

