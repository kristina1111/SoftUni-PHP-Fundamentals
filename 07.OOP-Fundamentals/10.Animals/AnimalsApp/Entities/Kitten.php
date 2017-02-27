<?php
namespace AnimalsApp\Entities;


class Kitten extends Cat
{
    public function produceSound(): string
    {
        return "Miau";
    }

    protected function setGender($gender)
    {
        if(strtolower($this->gender)!="female"){
            throw new \Exception("Invalid input!");
        }
        parent::setGender($gender);
    }


}