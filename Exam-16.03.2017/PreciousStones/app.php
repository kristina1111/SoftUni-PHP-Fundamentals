<?php

//
//var_dump(strpos('a', 'abv')==false);
//exit;
//$input = ["rocks" =>"zhzdde,hzccd,eezhg"];

$preciousStonesArr = [];
$arrRocks = explode(',', trim($_GET['rocks']));
$rockChecker = $arrRocks[0];
$regex = '/[a-z]/';
$isInRock = true;
for($i=0; $i<strlen($rockChecker); $i++){
    if(preg_match($regex, $rockChecker[$i])){
        for($k=1; $k<count($arrRocks); $k++){
            if((strpos($arrRocks[$k], $rockChecker[$i])!==false)){
//                var_dump(strpos($arrRocks[$k], $rockChecker[$i]));
                continue;
            }
            $isInRock = false;
            break;

        }
        if($isInRock){
            if(!in_array($rockChecker[$i], $preciousStonesArr)){
                $preciousStonesArr[] = $rockChecker[$i];
            }

        }
        $isInRock = true;
    }
}

echo count($preciousStonesArr);