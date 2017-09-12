<?php

$input = explode(', ', trim(fgets(STDIN)));
$x1 = $input[0];
$y1 = $input[1];
$x2 = $input[2];
$y2 = $input[3];

echo "{{$x1}, {$y1}} to {0, 0} is "
. (isValid($x1, $y1) ? "valid" : "invalid") . PHP_EOL;
echo "{{$x2}, {$y2}} to {0, 0} is "
. (isValid($x2, $y2) ? "valid" : "invalid") . PHP_EOL;
echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is "
. (isValid($x1, $y1, $x2, $y2) ? "valid" : "invalid");

function isValid($x1, $y1, $x2 = 0, $y2 = 0)
{
    $dist = sqrt(pow($x1 - $x2, 2) + pow($y1 - $y2, 2));
    return filter_var($dist, FILTER_VALIDATE_INT);
}