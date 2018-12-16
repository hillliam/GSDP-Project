<?php
require "support/constants.php";

function createtable()
{
    $connection = conect();
    query("create table cab"
            . "("
            . "length number not null,"
            . "width number not null,"
            . "doors number not null"
            . "sizex number not null"
            . "sizey number not null"
            . "mfc number(5,2) not null"
            . ")");
    close($connection);
}

function insetintocab1()
{
    $connection = conect();
    $start = "INSERT INTO cab VALUES (";
    $statment = "24, 18, 1, 715, 595, 200";
    query($start. $statment .");");
    $statment = "36, 18, 2, 715, 450, 248";
    query($start. $statment .");");
    $statment = "48, 18, 2, 715, 595, 296";
    query($start. $statment .");");
    $statment = "60, 18, 3, 715, 595, 344";
    query($start. $statment .");");
    $statment = "72, 18, 3, 715, 595, 392";
    query($start. $statment .");");
    $statment = "84, 18, 4, 715, 595, 440";
    query($start. $statment .");");
    $statment = "96, 18, 4, 715, 594, 488";
    query($start. $statment .");");
    close($connection);
}
function insetintocab2()
{
    $connection = conect();
    $start = "INSERT INTO cab VALUES (";
    $statment = "24, 20, 1, 715, 595, 208";
    query($start. $statment .");");
    $statment = "36, 20, 2, 715, 450, 256";
    query($start. $statment .");");
    $statment = "48, 20, 2, 715, 595, 304";
    query($start. $statment .");");
    $statment = "60, 20, 3, 715, 595, 352";
    query($start. $statment .");");
    $statment = "72, 20, 3, 715, 595, 400";
    query($start. $statment .");");
    $statment = "84, 20, 4, 715, 595, 448";
    query($start. $statment .");");
    $statment = "96, 20, 4, 715, 595, 496";
    query($start. $statment .");");
    close($connection);
}
function insetintocab3()
{
    $connection = conect();
    $start = "INSERT INTO cab VALUES (";
    $statment = "24, 24, 1, 715, 595, 224";
    query($start. $statment .");");
    $statment = "36, 24, 2, 715, 450, 272";
    query($start. $statment .");");
    $statment = "48, 24, 2, 715, 595, 320";
    query($start. $statment .");");
    $statment = "60, 24, 3, 715, 595, 368";
    query($start. $statment .");");
    $statment = "72, 24, 3, 715, 595, 416";
    query($start. $statment .");");
    $statment = "84, 24, 4, 715, 595, 464";
    query($start. $statment .");");
    $statment = "96, 24, 4, 715, 595, 512";
    query($start. $statment .");");
    close($connection);
}

createtable();
insetintocab1();
insetintocab2();
insetintocab3();