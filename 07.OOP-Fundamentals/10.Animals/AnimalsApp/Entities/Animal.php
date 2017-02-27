<?php
namespace AnimalsApp\Entities;

use AnimalsApp\IO\ConsoleIO;

class Animal implements AnimalInterface
{
    protected $name;
    protected $age;
    protected $gender;

    /**
     * Animal constructor.
     * @param array $info
     */
    public function __construct(array $info)
    {
        $this->setName($info[0]);
        $this->setAge(intval($info[1]));
        $this->setGender($info[2]);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @throws \Exception
     */
    protected function setName($name)
    {
        if(strlen($name)===0){
            throw new \Exception("Invalid input!");
        }
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @throws \Exception
     */
    protected function setAge($age)
    {
        if($age<0){
            throw new \Exception("Invalid input!");
        }
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @throws \Exception
     */
    protected function setGender($gender)
    {
        if(strtolower($gender)!="male" && strtolower($gender)!="female")
        {
            throw new \Exception("Invalid input!");
        }
        $this->gender = $gender;
    }



    public function produceSound(): string
    {
        return "Not implemented!";
    }

    function getClass(): string
    {
        $arr = explode('\\', get_class($this));
        return $arr[count($arr)-1];
    }

    public function __toString()
    {
        $output = $this->getClass()
            . " "
            . $this->getName()
            . " "
            . $this->getAge()
            . " "
            . $this->getGender()
            . PHP_EOL;
        $output .= $this->produceSound() . PHP_EOL;

        return $output;
    }


}