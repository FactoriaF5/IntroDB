<?php

namespace App\Controllers;


use App\Models\Student;


require("../Database.php");
require("../Models/Student.php");

if (!empty($_POST)) {
    //$database = new Database();

    $newStudent = new Student($_POST["name"]);

    // $name = $newStudent->getName();
    //$database->mysql->query("INSERT INTO `students` (`name`) VALUES ('$name');");

    $newStudent->save();

    header('Location: ../../index.php');
}

?>

<h1>Nuevo Estudiante</h1>

<form action="CreateStudent.php" method="post">
    <input type="text" name="name">
    <input type="submit" value="Crear">
</form>