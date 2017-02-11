<?php
/*Your task is to implement a program that keeps track of cars and their fuel and supports methods for moving the
cars. Define a class Car that keeps track of a car’s Model, fuel amount, fuel cost for 1 kilometer and distance
traveled. A Car’s Model is unique - there will never be 2 cars with the same model.
On the first line of the input you will receive a number N – the number of cars you need to track, on each of the
next N lines you will receive information for a car in the following format “<Model> <FuelAmount>
<FuelCostFor1km>”, all cars start at 0 kilometers traveled.
After the N lines until the command “End” is received, you will receive a commands in the following format “Drive
<CarModel> <amountOfKm>”, implement a method in the Car class to calculate whether or not a car can move
that distance, if it can the car’s fuel amount should be reduced by the amount of used fuel and its distance traveled
should be increased by the amount of kilometers traveled, otherwise the car should not move (Its fuel amount and
distance traveled should stay the same) and you should print on the console “Insufficient fuel for the drive”. After
the “End” command is received, print each car and its current fuel amount and distance traveled in the format
“<Model> <fuelAmount> <distanceTraveled>”, where the fuel amount should be printed to two decimal places
after the separator.
 *
 * Sample input 1:
2
AudiA4 23 0.3
BMW-M2 45 0.42
Drive BMW-M2 56
Drive AudiA4 5
Drive AudiA4 13
End

 * Sample input 2
3
AudiA4 18 0.34
BMW-M2 33 0.41
Ferrari-488Spider 50 0.47
Drive Ferrari-488Spider 97
Drive Ferrari-488Spider 35
Drive AudiA4 85
Drive AudiA4 50
End
 */
require_once "Car.php";

$carArr = [];
for($i =trim(fgets(STDIN)); $i>0; $i-- ){
    $inputInfo = array_map('trim', explode(' ', trim(fgets(STDIN))));
    $carArr[$inputInfo[0]] = new Car($inputInfo[0], $inputInfo[1], $inputInfo[2]);
}

$command = trim(fgets(STDIN));
while (mb_strtolower($command)!="end"){
    $command = array_map('trim', explode(' ', $command));
    if($carArr[$command[1]]->canBeDriven(floatval($command[2]))){
        $carArr[$command[1]]->afterDriving(floatval($command[2]));
    }
    else{
        echo "Insufficient fuel for the drive" . PHP_EOL;
    }
    $command = trim(fgets(STDIN));
}
$counter = 0;
foreach ($carArr as $key=>$value){
    echo $key . " " . number_format($value -> getFuelAmount(), 2) . " " . $value->getDistancePassed();
    if($counter<count($carArr)-1){
        echo PHP_EOL;
    }
    $counter++;
}
unset($counter);
?>