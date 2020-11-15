<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;
use App\Database;
use App\Models\Student;

class StudentTest extends TestCase
{
    // baciar base de datos
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

    public function test_can_retrive_an_studentList()
    {
        $this->db->mysql->query("INSERT INTO `students` (`name`) VALUES ('Alex');");
        $this->db->mysql->query("INSERT INTO `students` (`name`) VALUES ('Cintia');");

        $studentList = Student::all();

        $this->assertEquals("Alex", $studentList[0]->getName());
        $this->assertEquals("Cintia", $studentList[1]->getName());
        $this->assertEquals(2, $studentList[1]->getId());
        $this->assertIsString($studentList[1]->getCreatedAt());
    }
}
