<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Student;
use phpDocumentor\Reflection\Location;

class ApiStudentController
{


    public function __construct(string $method, array $content = null, $id = null)
    {

        if ($method == "GET") {
            $this->index();
        }

        if ($method == "POST") {
            $this->store($content);
        }

        if ($method == "DELETE") {
            $this->delete($id);
        }
    }

    public function index(): void
    {
        $studentsList = Student::all();

        $studentResponse = [];
        foreach ($studentsList as $student) {
            array_push($studentResponse, [
                "id" => $student->getId(),
                "name" => $student->getName(),
                "createdAt" => $student->getCreatedAt()
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

        //$this->index();
    }

    public function update(array $request, $id)
    {
        $studentToUpdate = Student::findById($id);
        $studentToUpdate->rename($request["name"]);
        $studentToUpdate->update();

        $this->index();
    }
}
