<?php

use phpDocumentor\Reflection\Location;
//use App\Models\Student;

require("../Database.php");
require("../Models/Student.php");


if (!empty($_POST)) {
    $database = new App\Database();

    $newStudent = new App\Models\Student($_POST["name"]);

    $name = $newStudent->getName();

    $database->mysql->query("INSERT INTO `students` (`name`) VALUES ('$name');");

    header('Location: ../../index.php');
}



?>

<h1>Nuevo Estudiante</h1>

<form action="CreateStudent.php" method="post">
    <input type="text" name="name">
    <input type="submit" value="Crear">
</form>