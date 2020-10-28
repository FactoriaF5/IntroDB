<?php

namespace App\Controllers;

// use App\Database;
use App\Models\Student;

require("src/Database.php");
require("src/Models/Student.php");

// $database = new Database();

// $students = $database->mysql->query("select * FROM students");

$student = new Student("");
$students = $student->all();
//var_dump($students);

echo "<ul>";
foreach ($students as $student) {
    echo "
    <li> {$student->getId()} - {$student->getName()} - {$student->getCreatedAt()}  </li>";
}
echo "</ul>";
// echo "<ul>";
// foreach ($students as $student) {
//     echo "
//     <li> {$student["id"]} - {$student["name"]} - {$student["created_at"]} </li>";
// }
// echo "</ul>";

?>

<a href="src/Controllers/CreateStudent.php">NUEVO</a>