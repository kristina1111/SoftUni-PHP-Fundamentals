<?php
$inputArr = explode(' ', trim(fgets(STDIN)));
$inputArr = array_filter($inputArr, function ($value){return $value!=='';});
$arrLength = count($inputArr);
$longestSeq = null;
$currentSeq = [$inputArr[0]];

for($i=1, $k = 0; $i<$arrLength; $i++){
    if($inputArr[$i] > $currentSeq[$k]) {
        $currentSeq[] = $inputArr[$i];
        $k++;
        continue;
    }

    if(count($currentSeq) > count($longestSeq)){
        $longestSeq = $currentSeq;
    }
    $currentSeq = [$inputArr[$i]];
    $k = 0;
}

if(count($currentSeq) > count($longestSeq)){
    $longestSeq = $currentSeq;
}
$longestSeq = trim(implode(' ', $longestSeq));
echo $longestSeq;

?>