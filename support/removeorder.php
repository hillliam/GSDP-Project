<?php
require "../support/constants.php";
query("DELETE from orders" . " where id=" . $_GET["g"]);

