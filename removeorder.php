<?php
require "../support/constants.php";
query("delete from" . "orders" . " where id=" . $_GET["g"]);

