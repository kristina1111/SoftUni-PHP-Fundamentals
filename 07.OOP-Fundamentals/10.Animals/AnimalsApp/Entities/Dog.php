<?php
namespace AnimalsApp\Entities;


class Dog extends Animal
{
    /**
     * @return string
     */
    public function produceSound(): string
    {
        return "BauBau";
    }


}