<?php
$input = trim(fgets(STDIN));
$input = strrev($input);
$input = explode(' ', $input);
$sum = array_sum($input);
echo $sum;

?>