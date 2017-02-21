<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once "$class";
});

define('MEALS', array('cram', 'lembas', 'apple', 'melon', 'honeycake', 'mushrooms'));

$input = strtolower(\IO\ConsoleIO::readLine());

$input = explode(',', $input);

$playerGandalf = new \Entities\Player(new \Entities\Mood());


foreach ($input as $food){
    $meal = null;
    if(in_array($food, MEALS)){

        $mealName = "Entities\\Foods\\" . ucfirst($food);


        $meal = new $mealName;
    }else{
        $meal = new Entities\Foods\AllElse();

    }

    $meal->givePoints($playerGandalf->getMood());

}
echo $playerGandalf;
