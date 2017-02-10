<?php

class Employee
{
    private static $lastId;

    private $id;
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    function __construct(string $name, float $salary, string $position, string $department,string $email = "n/a", int $age = -1)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->age = $age;
        $this->email = $email;
        $this->id = ++self::$lastId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position)
    {
        $this->position = $position;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department)
    {
        $this->department = $department;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function iteratePropertiesForPrint(){
        return $this->name . " " . $this->salary . " " . $this->email . " " . $this->age . PHP_EOL;

    }

}