<?php
require_once "Person.php";

$numInputs = trim(fgets(STDIN));
$arrPersons = [];
while ($numInputs>0){
    $inputArr = array_map('trim', explode(' ', trim(fgets(STDIN))));
    if($inputArr[1]>30){
        $person = new Person($inputArr[0], intval($inputArr[1]));
        $arrPersons[] = $person;
    }

    $numInputs--;
}

usort($arrPersons, "sortByName");
foreach ($arrPersons as $eachPerson){
    echo $eachPerson->getName() . " - " . $eachPerson->getAge() . PHP_EOL;
}

function sortByName($a, $b){
    return strcmp($a -> getName(), $b -> getName());
}

