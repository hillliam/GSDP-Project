<?php
require "../support/constants.php";
query("INSERT INTO  orders "
        . "(id ,tankx ,tanky ,tankz ,sidethickness ,basethickness ,sumpx ,sumpy ,sumpz ,sumpside ,sumpbase ,lowiron ,frametype ,lidtype) "
        . "VALUES (NULL ,  '". $_GET["tankx"] ."',  '".$_GET["tanky"]."',  '".$_GET["tankz"]."',  '".$_GET["sidethickness"]."',  '".$_GET["basethickness"]."',  '".$_GET["sumpx"]."',  '".$_GET["sumpy"]."',  '".$_GET["sumpz"]."',  '".$_GET["sumpside"]."',  '".$_GET["sumpbase"]."',  '".$_GET["lowiron"]."',  '".$_GET["frametype"]."',  '".$_GET["lidtype"]."' );");

