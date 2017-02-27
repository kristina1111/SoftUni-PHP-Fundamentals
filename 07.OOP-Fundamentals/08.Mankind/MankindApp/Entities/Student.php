<?php
namespace MankindApp\Entities;

class Student extends HumanAbstract
{
    protected $facultyNum;

    /**
     * Student constructor.
     * @param array $info
     */
    public function __construct(array $info)
    {
        parent::__construct($info);
        $this->setFacultyNum($info[2]);
    }

    /**
     * @return mixed
     */
    public function getFacultyNum()
    {
        return $this->facultyNum;
    }

    /**
     * @param mixed $facultyNum
     * @throws \Exception
     */
    public function setFacultyNum($facultyNum)
    {
        if(!(is_numeric($facultyNum) && strlen($facultyNum)>=5 && strlen($facultyNum)<=10)){
            throw new \Exception("Invalid faculty number!");
        }
        $this->facultyNum = $facultyNum;
    }

    public function __toString()
    {
        $output =  parent::__toString();
        $output .= "Faculty number: " . $this->getFacultyNum();

        return $output;

    }


}