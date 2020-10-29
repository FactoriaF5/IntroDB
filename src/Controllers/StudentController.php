<?php

namespace App\Controllers;

use App\Models\Student;


class StudentController
{

    public function __construct()
    {
        if (isset($_GET) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }

        if (isset($_GET) && ($_GET["action"] == "store")) {
            $this->store($_POST);
            return;
        }

        $this->index();
    }

    public function index(): void
    {
        $student = new Student();
        $students = $student->all();

        echo "<ul>";
        foreach ($students as $student) {
            echo "<li> {$student->getId()} - {$student->getName()} - {$student->getCreatedAt()} - delete </li>";
        }
        echo
            "</ul> <a href='?action=create'>NUEVO</a>";
    }

    public function create(): void
    {
        echo  <<<TAG
        <h1>Nuevo Estudiante</h1>

        <form action='?action=store' method="post">
            <input type="text" name="name">
            <input type="submit" value="Crear">
        </form>
        TAG;
    }

    public function store(array $request): void
    {
        $newStudent = new Student($request["name"]);
        $newStudent->save();


        header('Location: index.php');
    }
}
