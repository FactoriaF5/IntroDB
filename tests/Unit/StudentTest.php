<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Student;


class StudentTest extends TestCase
{

    public function test_can_create_only_named_Student()
    {
        $student = new Student("Joana");
        $this->assertEquals("Joana", $student->getName());
    }

    public function test_can_create_a_student_Student()
    {
        $student = new Student("Joana", 1, "12/4/200");
        $this->assertEquals("Joana", $student->getName());
        $this->assertEquals(1, $student->getId());
        $this->assertEquals("12/4/200", $student->getCreatedAt());
    }
}
