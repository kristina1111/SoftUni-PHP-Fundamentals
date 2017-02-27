<?php
namespace MankindApp\Entities;

class Employee extends HumanAbstract
{
    protected $weekSalary;
    protected $workHours;

    public function __construct(array $info)
    {
        parent::__construct($info);
        $this->setWeekSalary($info[2]);
        $this->setWorkHours($info[3]);
    }

    protected function setLastName(string $lastName)
    {
        if(strlen($lastName)<4){
            throw new \InvalidArgumentException("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }

    /**
     * @return mixed
     */
    public function getWeekSalary()
    {
        return $this->weekSalary;
    }

    /**
     * @param mixed $weekSalary
     */
    protected function setWeekSalary($weekSalary)
    {
        if($weekSalary<=10){
            throw new \InvalidArgumentException("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    /**
     * @return mixed
     */
    public function getWorkHours()
    {
        return $this->workHours;
    }

    /**
     * @param mixed $workHours
     */
    protected function setWorkHours($workHours)
    {
        if($workHours<1 || $workHours>12){
            throw new \InvalidArgumentException("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHours = $workHours;
    }

    /**
     * @return float
     */
    public function getSalaryPerHour() : float
    {
        return $this->getWeekSalary()/7/$this->getWorkHours();
    }

    public function __toString()
    {
        $output =  parent::__toString();
        $output .= "Week Salary: " . number_format($this->getWeekSalary(), 2, '.', '') . PHP_EOL;
        $output .= "Hours per day: " . number_format($this->getWorkHours(), 2, '.', '') . PHP_EOL;
        $output .= "Salary per hour: " . number_format($this->getSalaryPerHour(), 2, '.', '') . PHP_EOL;
        return $output;
    }


}