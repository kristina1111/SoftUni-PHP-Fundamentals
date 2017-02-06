<?php
$inputArr = explode(' ', trim(fgets(STDIN)));
$inputArr = array_filter($inputArr, function ($value){return $value!=='';});
$arrLength = count($inputArr);
$arrUniqueNums = array();
foreach ($inputArr as $value){
if(!array_key_exists($value, $arrUniqueNums)){
    $arrUniqueNums[$value]=1;
}else{
    $arrUniqueNums[$value]+=1;
}
}
$mostFreqNun = null;
$hasPassedOnce = true;
foreach ($arrUniqueNums as $key => $value){
    if($hasPassedOnce){
        $mostFreqNun = $key;
        $hasPassedOnce = false;
        continue;
    }

    if($value>$arrUniqueNums[$mostFreqNun]){
        $mostFreqNun = $key;
    }
}
echo $mostFreqNun;
?>