<?php


namespace App\Models;


use App\Database;

class Student
{
    private ?int $id;
    private string $name;
    private ?string $created_at;
    private  $database;
    private $table = "students";

    public function __construct(string $name = '', int $id = null, string $created_at = null)
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

    public function rename($name)
    {
        $this->name = $name;
    }

    public function save()
    {
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`name`) VALUES ('$this->name');");
    }

    public static function all()
    {
        $database = new Database();
        $query = $database->mysql->query("select * FROM students");
        $studentsArray = $query->fetchAll();
        $studentList = [];
        foreach ($studentsArray as $student) {
            $studentItem = new self($student["name"], $student["id"], $student["created_at"]);
            array_push($studentList, $studentItem);
        }

        return $studentList;
    }

    public function deleteById($id)
    {
        $query = $this->database->mysql->query("DELETE FROM `students` WHERE `students`.`id` = {$id}");
    }

    public function delete()
    {
        $query = $this->database->mysql->query("DELETE FROM `students` WHERE `students`.`id` = {$this->id}");
    }

    public static function findById($id): Student
    {
        $database = new Database();
        $query = $database->mysql->query("SELECT * FROM `students` WHERE `id` = {$id}");
        $result = $query->fetchAll();

        return new self($result[0]["name"], $result[0]["id"], $result[0]["created_at"]);
    }

    public function UpdateById($data, $id)
    {
        $this->database->mysql->query("UPDATE `students` SET `name` =  '{$data["name"]}' WHERE `id` = {$id}");
    }

    public function Update()
    {
        $this->database->mysql->query("UPDATE `students` SET `name` =  '{$this->name}' WHERE `id` = {$this->id}");
    }
}
