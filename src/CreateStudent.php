<?php

use phpDocumentor\Reflection\Location;

require("Database.php");



if (!empty($_POST)) {
    $database = new App\Database();
    //echo "Enviado por método: POST";
    //var_dump($_POST);
    //echo "NAME: " . $_POST["name"];

    $database->mysql->query("INSERT INTO `students` (`name`) VALUES ('{$_POST["name"]}');");

    header('Location: ../index.php');
}



?>

<h1>Nuevo Estudiante</h1>

<form action="CreateStudent.php" method="post">
    <input type="text" name="name">
    <input type="submit" value="Crear">
</form>