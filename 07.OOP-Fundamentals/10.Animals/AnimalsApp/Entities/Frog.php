<?php
namespace AnimalsApp\Entities;


class Frog extends Animal
{
    /**
     * @return string
     */
    public function produceSound(): string
    {
        return "Frogggg";
    }
}