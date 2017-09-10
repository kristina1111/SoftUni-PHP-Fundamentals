<?php
$number = trim(fgets(STDIN));
//$number = 101;

while (!isAverageHigherThan($number, 5)){
    $number = modifyNumber($number);
}

echo $number;

function modifyNumber($number){
    return $number . '9';
}

function isAverageHigherThan($number, $numToCompare){
    $average = array_sum(array_map('intval', str_split($number)))/strlen($number);
    return $average>$numToCompare;
}