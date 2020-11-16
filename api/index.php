<?php

require("../vendor/autoload.php");
header("Content-Type: application/json");

echo ($_SERVER['REQUEST_METHOD']);

echo file_get_contents("php://input");
//new App\Controllers\ApiStudentController();
