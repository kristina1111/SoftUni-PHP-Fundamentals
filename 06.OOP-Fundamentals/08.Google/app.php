<?php

spl_autoload_register(function($class) {
    $class = $class . '.php';
    require_once "Models/" . $class;
});
$personsArr = [];
$input = trim(fgets(STDIN));
while (strtolower($input)!="end"){
    $input = array_map('trim', explode(' ', $input));
    $objectNeeded = $input[1];
    switch ($objectNeeded){
        case "company":
            if(array_key_exists($input[0], $personsArr)){
                $personsArr[$input[0]]->getOccupation()->changeOccupation($input[2], $input[3], $input[4]);
            }else{
                $personsArr[$input[0]] = new Person($input[0], new Occupation(), new Car());
                $personsArr[$input[0]]->getOccupation()->changeOccupation($input[2], $input[3], $input[4]);
            }
            break;

        case "pokemon":
        case "parents":
        case "children":
            if(array_key_exists($input[0], $personsArr)){
                if(array_key_exists($input[2], $personsArr[$input[0]]->getArray($input[1]))){
                    $personsArr[$input[0]]->changeInfo($input[1], $input[2], $input[3]);
                }else{
                    $personsArr[$input[0]]->addToArray($input[1], $input[2], $input[3]);
                }
            }else{
                $personsArr[$input[0]] = new Person($input[0], new Occupation(), new Car());
                $personsArr[$input[0]]->addToArray($input[1], $input[2], $input[3]);
            }
            break;
        case "car":
            if(array_key_exists($input[0], $personsArr)){
                $personsArr[$input[0]]->getCar()->changeCar($input[2], $input[3]);
            }else{
                $personsArr[$input[0]] = new Person($input[0], new Occupation(), new Car());
                $personsArr[$input[0]]->getCar()->changeCar($input[2], $input[3]);
            }
            break;

        default:

            break;
    }

    $input = trim(fgets(STDIN));
}

print_r($personsArr);

