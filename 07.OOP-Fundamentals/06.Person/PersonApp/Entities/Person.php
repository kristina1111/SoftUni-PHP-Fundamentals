<?php
namespace PersonApp\Entities;

class Person
{
    protected $name;
    protected $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
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
        if(strlen($name)<3){
            throw new \Exception("Name’s length should not be less than 3 symbols!");
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
        if($age<1){
            throw new \Exception("Age must be positive!");
        }

        $this->age = $age;
    }


}