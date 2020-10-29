<?php

namespace App\Controllers;

use App\Core\Views;
use App\Models\Student;
use phpDocumentor\Reflection\DocBlock\Tag;

class StudentController
{

    public function __construct()
    {
        if (isset($_GET) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }

        $this->index();
    }

    public function index()
    {
        $student = new Student();
        $students = $student->all();

        echo "<ul>";
        foreach ($students as $student) {
            echo "
        <li> {$student->getId()} - {$student->getName()} - {$student->getCreatedAt()} - delete </li>";
        }
        echo
            "</ul> <a href='?action=create'>NUEVO</a>";
    }

    public function create()
    {
        echo  <<<TAG
        <h1>Nuevo Estudiante</h1>

        <form action=CreateStudent.php" method="post">
            <input type="text" name="name">
            <input type="submit" value="Crear">
        </form>
        TAG;
    }
}
