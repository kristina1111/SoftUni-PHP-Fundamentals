<!--Combined solution for Part I, exercise 1 & Part II, exercise 1-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate two numbers</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    Enter number: <input type="text" name="num1"/>
    Enter another number: <input type="text" name="num2"/>
    Choose operation: <select name="operation">
        <option value="sum" selected="selected">Sum</option>
        <option value="subtract">Subtract</option>
        <option value="multiply">Multiply</option>
        <option value="divide">Divide</option>
    </select>
    <input type="submit"/>
</form>
<?php
if(isset($_GET['num1']) && isset($_GET['num1'])&& isset($_GET['operation'])){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operation = $_GET['operation'];

    if($operation == "sum"){
        $sum = $num1 + $num2;
        echo "The sum of these numbers is {$sum}.";
    }
    elseif ($operation == "subtract"){
        $diff = $num1 - $num2;
        echo "The difference between these numbers is {$diff}.";
    }
    elseif ($operation == "multiply"){
        $multiplication = $num1*$num2;
        echo "The multiplication of these numbers is {$multiplication}.";
    }
    elseif ($operation == "divide"){
        $division = $num1/$num2;
        echo "The division of these numbers is {$division}.";
    }

}
?>
</body>
</html>