<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

$person = new \PersonApp\Entities\Person("Katya", 27);
$child = new \PersonApp\Entities\Child("Maya", 10);

print_r($person);
print_r($child);