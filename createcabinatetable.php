<?php
require "support/constants.php";

function createtable()
{
    connet()->query("create table cab"
            . "("
            . "length number not null,"
            . "width number not null,"
            . "doors number not null"
            . "sizex number not null"
            . "sizey number not null"
            . "mfc number(5,2) not null"
            . ")");
}

function insetintocab1()
{
    $start = "INSERT INTO `cab` VALUES (";
    $statment = "24, 18, 1, 715, 595, 200";
    connet()->query($start. $statment .");");
    $statment = "36, 18, 2, 715, 450, 248";
    connet()->query($start. $statment .");");
    $statment = "48, 18, 2, 715, 595, 296";
    connet()->query($start. $statment .");");
    $statment = "60, 18, 3, 715, 595, 344";
    connet()->query($start. $statment .");");
    $statment = "72, 18, 3, 715, 595, 392";
    connet()->query($start. $statment .");");
    $statment = "84, 18, 4, 715, 595, 440";
    connet()->query($start. $statment .");");
    $statment = "96, 18, 4, 715, 594, 488";
    connet()->query($start. $statment .");");
}
function insetintocab2()
{
    $start = "INSERT INTO `cab` VALUES (";
    $statment = "24, 20, 1, 715, 595, 208";
    connet()->query($start. $statment .");");
    $statment = "36, 20, 2, 715, 450, 256";
    connet()->query($start. $statment .");");
    $statment = "48, 20, 2, 715, 595, 304";
    connet()->query($start. $statment .");");
    $statment = "60, 20, 3, 715, 595, 352";
    connet()->query($start. $statment .");");
    $statment = "72, 20, 3, 715, 595, 400";
    connet()->query($start. $statment .");");
    $statment = "84, 20, 4, 715, 595, 448";
    connet()->query($start. $statment .");");
    $statment = "96, 20, 4, 715, 595, 496";
    connet()->query($start. $statment .");");
}
function insetintocab3()
{
    $start = "INSERT INTO `cab` VALUES (";
    $statment = "24, 24, 1, 715, 595, 224";
    connet()->query($start. $statment .");");
    $statment = "36, 24, 2, 715, 450, 272";
    connet()->query($start. $statment .");");
    $statment = "48, 24, 2, 715, 595, 320";
    connet()->query($start. $statment .");");
    $statment = "60, 24, 3, 715, 595, 368";
    connet()->query($start. $statment .");");
    $statment = "72, 24, 3, 715, 595, 416";
    connet()->query($start. $statment .");");
    $statment = "84, 24, 4, 715, 595, 464";
    connet()->query($start. $statment .");");
    $statment = "96, 24, 4, 715, 595, 512";
    connet()->query($start. $statment .");");
}
