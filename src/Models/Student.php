<?php


namespace App\Models;

use DateTime;
use App\Database;

class Student
{
    private int $id;
    private string $name;
    private DateTime $created_at;
    private $database;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->database = new Database();
    }

    public function getName()
    {
        return $this->name;
    }

    public function save()
    {
        $this->database->mysql->query("INSERT INTO `students` (`name`) VALUES ('$this->name');");
    }

    public static function all()
    {
    }
}
