<?php

class Person{
    public $name;
    public $age;

    function __construct(string $name, int $age)
    {
        $this->name=$name;
        $this->age = $age;
    }
}

$inp = trim(intval(fgets(STDIN)));
$allp = [];
$maxage = 0;

for ($i=0;$i<$inp;$i++) {
    $info = explode(" ", trim(fgets(STDIN)));
    $person = new Person($info[0], intval($info[1]));
    if(array_key_exists($person->age, $allp)){
        continue;
    }
    $allp[$person->age] = $person->name;
    if($person->age > $maxage) {
        $maxage = $person->age;
    }
}

echo $allp[$maxage] . " " . $maxage;