<?php

require("../vendor/autoload.php");
header("Content-Type: application/json");

$request = $_SERVER;

//echo file_get_contents("php://input");

new App\Core\ApiRouter($request);
//new App\Controllers\ApiStudentController();
