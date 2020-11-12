<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use App\Models\Student;
use App\Database;


class StudentTest extends TestCase
{
    private $db;

    private function initDB()
    {
        $db = new Database();
        $db->mysql->query("DELETE FROM `students`");
        $db->mysql->query("ALTER TABLE `students` AUTO_INCREMENT = 1");
        $this->db = $db;
    }

    public function setUp(): void
    {
        $this->initDB();
    }

    public function test_can_retrieve_Student_list()
    {
        $this->db->mysql->query("INSERT INTO `students` (`name`) VALUES ('Joana')");
        $this->db->mysql->query("INSERT INTO `students` (`name`) VALUES ('Fritz')");
        $studentList = Student::all();

        $this->assertEquals("Joana", $studentList[0]->getName());
        $this->assertEquals("Fritz", $studentList[1]->getName());
        $this->assertEquals(1, $studentList[0]->getId());
        $this->assertEquals(2, $studentList[1]->getId());
        $this->assertIsString($studentList[1]->getCreatedAt());
    }
}
