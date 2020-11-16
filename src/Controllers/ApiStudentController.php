<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Student;
use phpDocumentor\Reflection\Location;

class ApiStudentController
{

    public function __construct()
    {

        if (isset($_GET) && ($_GET["action"] == "store")) {
            $this->store($_POST);
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
        $studentsList = Student::all();

        $studentResponse = [];
        foreach ($studentsList as $student) {
            array_push($studentResponse, [
                "id" => $student->getId(),
                "name" => $student->getName()
            ]);
        }

        echo json_encode($studentResponse);
    }


    public function store(array $request): void
    {
        $newStudent = new Student($request["name"]);
        $newStudent->save();

        $this->index();
    }

    public function delete($id)
    {
        $studentToDelete = Student::findById($id);
        $studentToDelete->delete();

        $this->index();
    }

    public function update(array $request, $id)
    {
        $studentToUpdate = Student::findById($id);
        $studentToUpdate->rename($request["name"]);
        $studentToUpdate->update();

        $this->index();
    }
}
