<?php

header("Content-Type: application/javascript");

require __DIR__."/teajs_helpers.php";

echo teajs_run(["ajax"]);