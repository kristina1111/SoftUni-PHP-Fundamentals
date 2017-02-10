<?php
require_once "Person.php";

$person  = new Person();
//echo count(get_object_vars($person)); // for Judge the properties need to be public

$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));

while(true){
    $person = new Person($name, $age);
    echo $person -> getName() . " " . $person -> getAge() . PHP_EOL;

    $name = trim(fgets(STDIN));
    $age = trim(fgets(STDIN));
}
