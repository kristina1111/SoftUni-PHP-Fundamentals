<?php
//spl_autoload_register(function($class) {
//    $class = $class . '.php';
//    require_once "Models/" . $class;
//});

$inputNum = trim(fgets(STDIN));
$family = new Family();
while ($inputNum--){
    $input = array_map('trim', explode(' ', trim(fgets(STDIN))));
    try{
        if(count($input)==2){
            $person = new Person($input[0], intval($input[1]));
            $family->addMemberToFamily($person);
        }else{
            throw new Exception("Information provided is not relevant!");
        }
    }catch (Exception $e){
        continue;
    }

}

echo $family->getOldestMember();