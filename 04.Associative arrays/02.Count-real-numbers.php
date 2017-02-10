<?php
$inputArr = explode(' ', trim(fgets(STDIN)));
$inputArr = array_filter($inputArr, function ($value){return $value!=='';});
$mapArr = array();
foreach ($inputArr as $value){
    if(!array_key_exists($value, $mapArr)){
        $mapArr[$value] = 1;
    }else{
        $mapArr[$value] +=1;
    }
}
ksort($mapArr);
foreach ($mapArr as $key => $value){
    echo "{$key} -> {$value} times\n";
}
?>