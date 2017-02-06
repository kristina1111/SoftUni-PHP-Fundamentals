<?php
$inputArr = explode(' ', trim(fgets(STDIN)));

$numRotations = (int)trim(fgets(STDIN));
$inputArr = array_filter($inputArr, function ($value){return $value!=='';});
$arrLength = count($inputArr);

if($numRotations>0){
    $sumArr = array_fill(0, $arrLength, 0);
    for($i=0; $i<$numRotations; $i++){
        $lastEl = $inputArr[$arrLength-1];
        array_splice($inputArr, $arrLength-1, 1);
        array_unshift($inputArr, $lastEl);

        $sumArr = array_map(function (){
            return array_sum(func_get_args());
        }, $sumArr, $inputArr);
    }
    $sumArr = trim(implode(' ', $sumArr));
    echo $sumArr;
}else{
    $inputArr = trim(implode(' ', $inputArr));
    echo $inputArr;
}

?>