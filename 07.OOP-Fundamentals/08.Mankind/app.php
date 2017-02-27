<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

$inputInfoStudent = explode(' ', trim(fgets(STDIN)));
$inputInfoEmployee = explode(' ', trim(fgets(STDIN)));
try{
    $student = new \MankindApp\Entities\Student($inputInfoStudent);
    $employee = new \MankindApp\Entities\Employee($inputInfoEmployee);

    echo $student . PHP_EOL;
    echo PHP_EOL;
    echo $employee;
}catch (Exception $e){
    echo $e->getMessage();
}

