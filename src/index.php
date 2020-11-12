<?php

namespace App;

use App\Controllers\StudentController;
use App\Controllers\ApiStudentController;

// if (assert($_GET)) {
//     echo "por get";
// }
// if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
//     echo "delete method";
// }

//$controller = new StudentController();
$controller = new ApiStudentController();
