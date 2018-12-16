<?php
require "support/constants.php";

function createtable()
{
    $connection = connet();
    query("create table glass"
            . "("
            . "thinkness number not null,"
            . "price number(4,2) not null,"
            . "Polish_edges number(4,2) not null"
            . ")");
    close($connection);
}

function insetintoglass()
{
    $connection = connet();
    $start = "INSERT INTO glass VALUES (";
    $statment = "25, 210.00, 7.75";
    query($start. $statment .");");
    $statment = "19, 130.00, 6.15";
    query($start. $statment .");");
    $statment = "15, 89.0, 3.50";
    query($start. $statment .");");
    $statment = "12, 40.0, 2.00";
    query($start. $statment .");");
    $statment = "10, 27.0, 1.50";
    query($start. $statment .");");
    $statment = "8, 23.0, 1.20";
    query($start. $statment .");");
    $statment = "6, 20.0, 1.00";
    query($start. $statment .");");
    $statment = "4, 15.0, 0.80";
    query($start. $statment .");");
    close($connection);
}

//createtable();
insetintoglass();