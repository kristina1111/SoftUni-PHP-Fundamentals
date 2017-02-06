<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sum two numbers</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    First number: <input type="text" name="first-num"/>
    Second number: <input type="text" name="second-num"/>
    <input type="submit"/>
</form>
<?php
if(isset($_GET['first-num']) && isset($_GET['second-num'])){
    $firstNum = $_GET['first-num'];
    $secondNum = $_GET['second-num'];
    echo htmlspecialchars(number_format(round($firstNum + $secondNum, 2), 2));
}
?>
</body>
</html>