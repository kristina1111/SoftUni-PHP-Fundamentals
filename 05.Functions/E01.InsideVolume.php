<?php

const x1 = 10;
const x2 = 50;
const y1 = 20;
const y2 = 80;
const z1 = 15;
const z2 = 50;

$inputNum = array_map('floatval', explode(', ', trim(fgets(STDIN))));
//$inputNum = array_map('floatval', explode(', ', trim('13.1, 50, 31.5, 50, 80, 50, -5, 18, 43')));

//print_r($inputNum);

function isInside($xp, $yp, $zp){
    if($xp >= x1 && $xp <= x2){
        if($yp>=y1 && $yp <= y2){
            if($zp >= z1 && $zp<=z2){
                return true;
            }
        }
    }
    return false;
}
for($i = 0; $i<count($inputNum); $i+=3){
    if(isInside($inputNum[$i], $inputNum[$i+1], $inputNum[$i+2])){
        echo 'inside'.PHP_EOL;
    }else{
        echo 'outside'.PHP_EOL;
    }
}


