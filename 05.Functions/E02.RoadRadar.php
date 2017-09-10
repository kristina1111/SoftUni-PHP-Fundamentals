<?php

const speedLimits =[
    'motorway' => 130,
    'interstate' => 90,
    'city' => 50,
    'residential' => 20
];

const limitForSpeeding = 20;
const limitForExcessive = 40;

$speed = intval(trim(fgets(STDIN)));
$area = trim(fgets(STDIN));
//$speed = 20;
//$area = 'residential';

$overSpeed = getOverSpeed($speed, $area);
echo getInfraction($overSpeed);

function getOverSpeed($speed, $area){
    $diff = speedLimits[$area] - $speed;
    if($diff<=0){
        return abs($diff);
    }
    return -1;

}

function getInfraction($overSpeed){
    if($overSpeed>=0){
        if($overSpeed<=20){
            return 'speeding';
        }
        if($overSpeed<=40){
            return 'excessive speeding';
        }
        return 'reckless driving';
    }
}
