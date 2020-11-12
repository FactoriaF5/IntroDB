<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use App\Models\Student;


class StudentTest extends TestCase
{

    public function test_can_retrieve_Student_list()
    {
        $studentList = Student::all();

        $this->assertEquals("Joana", $student->getName());
    }
}
