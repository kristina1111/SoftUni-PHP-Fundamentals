<?php

$input = trim(fgets(STDIN));
$person = new Person($input);
echo $person->saysGreeting("Hello");

class Person
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
    }

    public function saysGreeting(string $greeting) : string {
        $greeting = "" . $this->getName() . " says " . "\"" . $greeting . "\"!";

        return $greeting;
    }
}