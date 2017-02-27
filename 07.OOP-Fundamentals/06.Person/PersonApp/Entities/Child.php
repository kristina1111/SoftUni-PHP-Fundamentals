<?php

namespace PersonApp\Entities;


class Child extends Person
{
    /**
     * Child constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct($name, $age)
    {
        parent::__construct($name, $age);
    }

    protected function setAge($age)
    {
        if($age>15){
            throw new \Exception("Child’s age must be less than 16!");
        }
        parent::setAge($age);
    }


}