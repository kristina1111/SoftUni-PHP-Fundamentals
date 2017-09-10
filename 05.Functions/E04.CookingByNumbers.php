<?php

const percentForFillet = 0.2;
const funcNames = ['chop' => 'chopNum',
    'dice' => 'dice',
    'spice' => 'spice',
    'bake' => 'bake',
    'fillet' => 'fillet'
];
$number = intval(trim(fgets(STDIN)));
$commands = explode(', ', trim(fgets(STDIN)));

foreach ($commands as $command){
    if(array_key_exists($command, funcNames)){
//        $number = funcNames[$command]($number);
        echo $number . PHP_EOL;
    }
}

function chopNum(float $number){
    return $number/2;
}
function dice(float $number){
    return sqrt($number);
}
function spice(float $number){
    return $number + 1;
}
function bake(float $number){
    return $number*3;
}
function fillet(float $number){
    return $number - $number*percentForFillet;
}