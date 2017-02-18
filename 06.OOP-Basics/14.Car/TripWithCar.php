<?php
require_once 'Models/Car.php';

$input = array_map('trim', explode(' ', trim(fgets(STDIN))));

$car = new Car(floatval($input[0]), floatval($input[1]), floatval($input[2]));
$output = "";
$input = trim(fgets(STDIN));
while (strtolower($input)!="end"){
    $input = array_map('trim', explode(' ', $input));
    $cmd = $input[0];
    switch ($cmd){
        case "Travel":
            $car->travel(floatval($input[1]));
            break;
        case "Refuel":
            $car->refuelCar(floatval($input[1]));
            break;
        case "Distance":
            $output .= "Total Distance: " . number_format($car->getDistanceTravelled(), 1) . PHP_EOL;
            break;
        case "Time":
            $hours = floor($car->getTimeTravelled()/60/60);
            $minutes = floor($car->getTimeTravelled()/60%60);
            $output .= "Total Time: " . $hours . " hours and " . $minutes . " minutes" . PHP_EOL;
            break;
        case "Fuel":
            $output .= "Fuel left: " . number_format($car->getFuelAmount(), 1) . " liters" . PHP_EOL;
            break;
    }

    $input = trim(fgets(STDIN));
}

echo $output;