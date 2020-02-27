<?php

header("Content-Type: application/javascript");

require __DIR__."/../src/TeaJS/TeaJS.php";

$teajs = new TeaJS\TeaJS;
$teajs->minify = true;
$teajs->run(["core", "ajax"]);
