<?php

namespace App\Controllers;

use App\Core\View;
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

        new View("StudentsList", [
            "students" => $students,

        ]);
    }

    public function create(): void
    {
        new View("CreateStudent");
    }

    public function store(array $request): void
    {
        $newStudent = new Student($request["name"]);
        $newStudent->save();


        header('Location: index.php');
    }
}
