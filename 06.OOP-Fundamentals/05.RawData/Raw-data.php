<?php
/**
 * You are the owner of a courier company and want to make a system for tracking your cars and their cargo. Define a
class Car that holds information about model, engine, cargo and a collection of exactly 4 tires. The engine, cargo
and tire should be separate classes, create a constructor that receives all information about the Car and creates and
initializes its inner components (engine, cargo and tires).
On the first line of input you will receive a number N - the amount of cars you have, on each of the next N lines you
will receive information about a car in the format “<Model> <EngineSpeed> <EnginePower> <CargoWeight>
<CargoType> <Tire1Pressure> <Tire1Age> <Tire2Pressure> <Tire2Age> <Tire3Pressure> <Tire3Age>
<Tire4Pressure> <Tire4Age>” where the speed, power, weight and tire age are integers, tire pressure is a double.
After the N lines you will receive a single line with one of 2 commands “fragile” or “flamable” , if the command is
“fragile” print all cars whose Cargo Type is “fragile” with a tire whose pressure is < 1, if the command is “flamable”
print all cars whose Cargo Type is “flamable” and have Engine Power > 250. The cars should be printed in order of
appearing in the input.
 *
 * Sample input 1:
2
ChevroletAstro 200 180 1000 fragile 1.3 1 1.5 2 1.4 2 1.7 4
Citroen2CV 190 165 1200 fragile 0.9 3 0.85 2 0.95 2 1.1 1
fragile
 *
 * Sample input 2:
4
ChevroletExpress 215 255 1200 flamable 2.5 1 2.4 2 2.7 1 2.8 1
ChevroletAstro 210 230 1000 flamable 2 1 1.9 2 1.7 3 2.1 1
DaciaDokker 230 275 1400 flamable 2.2 1 2.3 1 2.4 1 2 1
Citroen2CV 190 165 1200 fragile 0.8 3 0.85 2 0.7 5 0.95 2
flamable
 *
 */

spl_autoload_register(function($class) {
    $class = $class . '.php';
    require_once "Models/" . $class;
});

$numInput = trim(fgets(STDIN));
$input = trim(fgets(STDIN));

$carArr = [];
while ($numInput--){
    $input = array_map('trim', explode(' ', $input));
    $engine = new Engine(floatval($input[1]), floatval($input[2]));
    $cargo = new Cargo(floatval($input[3]), $input[4]);
    $tyre1 = new Tyre(floatval($input[5]), intval($input[6]));
    $tyre2 = new Tyre(floatval($input[7]), intval($input[8]));
    $tyre3 = new Tyre(floatval($input[9]), intval($input[10]));
    $tyre4 = new Tyre(floatval($input[11]), intval($input[12]));

    $car = new Car($input[0], $engine, $cargo, array($tyre1, $tyre2, $tyre3, $tyre4));
    $carArr[$car->getCargo()->getType()][] = $car;

    $input = trim(fgets(STDIN));
}

$output = "";
if(array_key_exists($input, $carArr)){
    if($input == "fragile"){
        foreach ($carArr[$input] as $car){
            if($car->hasTyrePressureUnder1()){
                $output .= $car->getModel() . PHP_EOL;
            }
        }
    }elseif($input == "flamable"){
        foreach ($carArr[$input] as $car){
            if($car->getEngine()->isPowerOver250()){
                $output .= $car->getModel() . PHP_EOL;
            }
        }
    }
}

echo $output;

?>