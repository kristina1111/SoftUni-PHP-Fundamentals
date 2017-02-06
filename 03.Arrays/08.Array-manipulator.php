<!--Judge - 90/100-->
<?php
$inputArr = explode(' ', trim(fgets(STDIN)));
$inputArr = array_filter($inputArr, function ($value){return $value!=='';});
$command = strtolower(trim(fgets(STDIN)));

while ($command!='print'){
    $inputArrLength = count($inputArr);
    $command = explode(' ', $command);
    $command = array_filter($command, function ($value){return $value!=='';});

    if($command[0]=='add'){
        array_splice($inputArr, $command[1], 0, $command[2]);
        print_r($inputArr);
    }elseif ($command[0]=='addmany'){
        array_splice($inputArr, $command[1], 0, array_slice($command, 2));
    }elseif($command[0]=='contains'){
        if(in_array($command[1], $inputArr)){
            $index = array_search($command[1], $inputArr);
            echo "{$index}\n";
        }else{
            echo "-1\n";
        }
    }elseif ($command[0]=='remove'){
        array_splice($inputArr, $command[1], 1);
    }elseif($command[0]=='shift'){
        $shiftArr = array_slice($inputArr, $command[1]); // save the elements that need to be shifted in array
        array_splice($inputArr, $command[1], $inputArrLength-$command[1]); // remove those elements from the input array
        array_splice($inputArr, 0, 0, $shiftArr); // add the new array with the shifted elements to the beginning of the inputArray
    }elseif($command[0]=='sumpairs'){
        $sumArr = [];
        for($i=1; $i<$inputArrLength; $i+=2){
            $sumArr[] = $inputArr[$i-1] + $inputArr[$i];
        }
        if($inputArrLength%2==1){
            $sumArr[] = $inputArr[$inputArrLength-1];
        }
        $inputArr = $sumArr;
    }
    $command = strtolower(trim(fgets(STDIN)));
}

$inputArr = trim(implode(", ", $inputArr), ", ");
echo "[{$inputArr}]";

?>