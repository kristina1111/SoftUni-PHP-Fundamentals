<?php
$inputArr = explode(' ', trim(fgets(STDIN)));
$inputArr = array_filter($inputArr, function ($value) {
    return $value !== '';
});
$inputLength = count($inputArr);
$leftSum = 0;
$rightSum = 0;

for ($i = 0; $i < $inputLength; $i++) {
//Calculate the right side
    $arrToSum = array_slice($inputArr, $i + 1, $inputLength - $i - 1);
    $rightSum = array_sum($arrToSum);
//Calculate the left side
    $arrToSum = array_slice($inputArr, 0, $i);
    $leftSum = array_sum($arrToSum);

    if ($rightSum == $leftSum) {
        echo $i;
        return;
    }elseif($leftSum>$rightSum){
        echo "no";
        return;
    }

    $leftSum = 0;
    $rightSum = 0;
}
//echo "no";

?>