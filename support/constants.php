<?php

/**
 * We put reusable constant values here to save us having to update too many
 * places at once.
 */

define("Trade_Mark_up", 25);
define("Fit_Mark_up", 40);

define("SQLHOST", "127.0.0.1");
define("SQLUSER", "root");
define("SQLDB", "FitFiltration");
define("SQLPASSWORD", "rasberry");

function connet()
{
    $mysql = new mysqli(SQLHOST, SQLUSER, SQLPASSWORD, SQLDB);
    if ($mysql->connect_errno)
    {
        echo "database down";
    }
    return $mysql;
}

function query($statment)
{
    $data = connet()->query($statment);
    $result = array();
    while ($row = $data->fetch_assoc()) {
		array_push($result, $row);
    }
    return $result;
}
?>