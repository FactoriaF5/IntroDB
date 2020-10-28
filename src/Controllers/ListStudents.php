<?php

namespace App\Controllers;

use App\Models\Student;

require("src/Database.php");
require("src/Models/Student.php");

$student = new Student("");
$students = $student->all();


echo "<ul>";
foreach ($students as $student) {
    echo "
    <li> {$student->getId()} - {$student->getName()} - {$student->getCreatedAt()} - delete </li>";
}
echo "</ul>";
"</ul>";

?>

<a href="src/Controllers/CreateStudent.php">NUEVO</a>