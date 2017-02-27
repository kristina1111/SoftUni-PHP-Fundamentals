<?php
namespace AnimalsApp\Entities;


class Tomcat extends Cat
{
    public function produceSound(): string
    {
        return "Give me one million b***h";
    }

    protected function setGender($gender)
    {
        if(strtolower($this->gender)!="male"){
            throw new \Exception("Invalid input!");
        }
        parent::setGender($gender);

    }


}