<?php

namespace App\Controllers;

use App\Models\Student;


class StudentController
{

    public function __construct()
    {
        // if (!empty($_GET) && $_GET["action"]) {
        //     $action = $_GET["action"];
        // }
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
            "</ul> <a href='src/Controllers/CreateStudent.php'>NUEVO</a>";
    }
}
