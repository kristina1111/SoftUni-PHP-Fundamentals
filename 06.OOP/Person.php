<?php

class Person
{
    private $name;
    private $age;

    public function __construct(string $name = "yourname", int $age = 0)
    {
        $this -> name = $name;
        $this -> age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this -> name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}