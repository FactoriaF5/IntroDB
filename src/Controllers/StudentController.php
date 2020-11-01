<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Student;
use phpDocumentor\Reflection\Location;

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
        $student = $studentHelper->findById($id);
        $student->delete();

        $this->index();
    }

    public function edit($id)
    {
        //Find Student By Id
        $studentHelper = new Student();
        $student = $studentHelper->findById($id);
        //Execute view with student atributes
        new View("EditStudent", ["student" => $student]);
    }

    public function update(array $request, $id)
    {
        // Update Student By ID
        $studentHelper = new Student();
        $student = $studentHelper->findById($id);
        $student->rename($request["name"]);
        $student->update();
        // Return to Viwe List
        $this->index();
    }
}
