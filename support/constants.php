<?php

/**
 * We put reusable constant values here to save us having to update too many
 * places at once.
 */

define("Trade_Mark_up", 0.25);
define("Fit_Mark_up", 0.41);
define("energyChargeRate", 0.28);

function connet()
{
    $mysql = pg_connect(getenv("DATABASE_URL"));
    if ($mysql == false)
    {
        echo "database down";
    }
    return $mysql;
}

function performquery($string) {

    return $result = pg_query($string);
}

function getrows($result)
{
    return pg_fetch_array($result, null, PGSQL_ASSOC);
}

function freeresult($result)
{
    pg_free_result($result);
}

function close($connection)
{
    pg_close($connection);
}

function query($statment)
{
    $connection = connet();
    $data = query($statment);
    $result = array();
    while ($row = getrows($data)) {
		array_push($result, $row);
    }
    close($connection);
    return $result;
}
?>