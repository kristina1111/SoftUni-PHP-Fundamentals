<?php
namespace AnimalsApp\Entities;

interface AnimalInterface
{
    function produceSound() : string ;

    function getClass() : string ;

    function __toString();
}