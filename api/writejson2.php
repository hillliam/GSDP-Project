<?php

require "../support/constants.php";
require "../model/books.php";

$books = findAllBooks();
header("content-type: application/json");
print json_encode($books);


