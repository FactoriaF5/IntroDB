<?php


namespace App\Models;

use DateTime;

class Student
{
    private int $id;
    private string $name;
    private DateTime $created_at;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function save()
    {
    }

    public static function all()
    {
    }
}
