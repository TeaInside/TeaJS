<?php

header("Content-Type: application/javascript");

require __DIR__."/../src/TeaJS/TeaJS.php";
$teajs = new TeaJS\TeaJS;
$teajs->minify = true;

if (isset($_GET["modules"])) {
    $teajs->run(explode(".", $_GET["modules"]));
    exit;
}

$teajs->run();
