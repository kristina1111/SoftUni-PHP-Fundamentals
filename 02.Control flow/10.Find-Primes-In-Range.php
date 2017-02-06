<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find Primes in Range</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    <label for="">Starting index: </label><input type="text" name="num1"/>
    <label for="">End: </label><input type="text" name="num2"/>
    <input type="submit" value="Show Primes" />
</form>
<div>
<?php
if(isset($_GET['num1']) && isset($_GET['num1'])){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    if($num1>$num2 && $num1>0 && $num2>0){
        echo "<h1>No consecutive numbers can be shown!</h1>";
        return;
    }
    elseif($num1<$num2 && $num1<=0 && $num2>0){
        $num1 = 1;
        echo "<h1>Negative numbers are excluded from the definition of prime numbers!</h1>";
    }
    elseif($num1<=0 && $num2<=0){
        echo "<h1>Negative numbers and zero are excluded from the definition of prime numbers!</h1>";
        return;
    }

    echo "<h2>Prime numbers from {$num1} to {$num2} are in bold!</h2>";
    $interval = $num2 - $num1 + 1;
//    $numArray = array_fill($num1, $interval, true);
    for($i = $num1; $i<=$num2; $i++){
        $isPrime = true;
        $sqrtNum = ceil(sqrt($i));
        for($k = 2; $k<= $sqrtNum; $k++){
            if($i%$k == 0){
                $isPrime = false;
                break;
            }
        }

        if($i==1){
            echo $i;
        }
        elseif($isPrime==true || $i==2){
            echo "<strong>{$i}</strong>";
        }
        else{
            echo $i;
//            $isPrime = true;
        }

        if($i<$num2){
            echo ", ";
        }
    }
}
?>
</div>
</body>
</html>