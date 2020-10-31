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

        if (isset($_GET) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }

        if (isset($_GET) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }

        if (isset($_GET) && ($_GET["action"] == "delete")) {

            $this->delete($_GET["id"]);
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

        $this->index();
    }

    public function delete($id)
    {
        $studentHelper = new Student();
        $studentHelper->deleteById($id);

        $this->index();
    }

    public function edit($id)
    {
        //Find Student By Id
        $studentHelper = new Student();
        echo $studentHelper->findById($id)->getName();
        //Execute view with student atributes
        // echo "edit {$id}";
    }

    public function update(array $request)
    {
    }
}
