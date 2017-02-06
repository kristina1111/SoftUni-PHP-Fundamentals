<?php
$inputArr1 = explode(' ', trim(fgets(STDIN)));
$inputArr1 = array_filter($inputArr1, function ($value){return $value!=='';});
$inputArr2 = explode(' ', trim(fgets(STDIN)));
$inputArr2 = array_filter($inputArr2, function ($value){return $value!=='';});

$lengthShorter = count($inputArr2)>count($inputArr2) ? count($inputArr2) : count($inputArr1);
$resultArr = array(
    "left" => 0,
    "right" => 0
);
$isLeft = true;
$isRight = true;
for($i=0; $i<$lengthShorter; $i++){
    if($inputArr1[$i]==$inputArr2[$i] && $isLeft){
        $resultArr['left']+=1;
    }else{
        $isLeft = false;
    }

    if($inputArr1[count($inputArr1)-1-$i]==$inputArr2[count($inputArr2)-1-$i] && $isRight){
        $resultArr['right']+=1;
    }
    else{
        $isRight = false;
    }
}

if($resultArr['left']>$resultArr['right']){
    echo $resultArr['left'];
}else{
    echo $resultArr['right'];
}

?>