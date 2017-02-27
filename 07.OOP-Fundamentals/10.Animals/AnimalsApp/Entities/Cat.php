<?php
namespace AnimalsApp\Entities;


class Cat extends Animal
{
    public function produceSound(): string
    {
        return "MiauMiau";
    }
}