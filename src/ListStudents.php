<?php
require("Database.php");

$database = new App\Database();

$students = $database->mysql->query("select * FROM students");

echo "<ul>";
foreach ($students as $student) {
    echo "
    <li> {$student["id"]} - {$student["name"]} - {$student["created_at"]} </li>";
}
echo "</ul>";

?>

<a href="src/CreateStudent.php">NUEVO</a>