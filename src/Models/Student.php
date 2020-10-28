<?php


namespace App\Models;


use App\Database;

class Student
{
    private ?int $id;
    private string $name;
    private ?string $created_at;
    private $database;
    private $table = "students";

    public function __construct(string $name = 'nombre', int $id = null, string $created_at = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->created_at = $created_at;
        if (!$this->database) {
            $this->database = new Database();
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function save(): void
    {
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`name`) VALUES ('$this->name');");
    }

    public function all()
    {
        $query = $this->database->mysql->query("select * FROM {$this->table}");
        $studentsArray = $query->fetchAll();
        $studentList = [];
        foreach ($studentsArray as $student) {
            $studentItem = new Student($student["name"], $student["id"], $student["created_at"]);
            array_push($studentList, $studentItem);
        }

        return $studentList;
    }
}
