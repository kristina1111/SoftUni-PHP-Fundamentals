<?php

class Occupation
{
    private $employer;
    private $department;
    private $salary;

    public function __construct(string $employer = "", string $department = "", float $salary = 0.0)
    {
        $this->employer = $employer;
        $this->department = $department;
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getEmployer(): string
    {
        return $this->employer;
    }

    /**
     * @param string $employer
     */
    private function setEmployer(string $employer)
    {
        $this->employer = $employer;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    private function setDepartment(string $department)
    {
        $this->department = $department;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    private function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function changeOccupation(string $employer, string $department, float $salary){
        $this->setEmployer($employer);
        $this->setDepartment($department);
        $this->setSalary($salary);
    }


}