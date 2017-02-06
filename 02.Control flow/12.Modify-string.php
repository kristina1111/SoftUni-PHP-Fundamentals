<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify string</title>
    <style>
        form>input{
            display: inline-block;
            margin: 10px;
        }
        section{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<form>
    <section>
        <label for="">Input string: </label><input type="text" name="string" />
    </section>
    <section>
        <input type="radio" value="palindrome" name="action" checked><label for="">Check palindrome</label>
    </section>
    <section>
        <input type="radio" value="reverse" name="action"><label for="">Reverse string</label>
    </section>
    <section>
        <input type="radio" value="split" name="action"><label for="">Split string</label>
    </section>
    <section>
        <input type="radio" value="hash" name="action"><label for="">Hash string</label>
    </section>
    <section>
        <input type="radio" value="shuffle" name="action"><label for="">Shuffle string</label>
    </section>

    <input type="submit"/>
</form>
<?php
if(!empty($_GET['string']) && isset($_GET['action'])) {
    $inputStr = $_GET['string'];
    $inputAction = $_GET['action'];
    if($inputAction == 'reverse'){
        $inputStr = strrev($inputStr);
        echo $inputStr;
    } elseif ($inputAction == 'palindrome'){
        $revStr = strrev($inputStr);
        if($revStr == $inputStr){
            echo "{$inputStr} is a palindrome!";
        }else{
            echo "{$inputStr} is not a palindrome!";
        }
    } elseif ($inputAction == 'split'){
        $inputStr = str_split($inputStr);
        $inputStr = array_filter($inputStr, function ($value){ return $value!==' ';});
        $inputStr = implode(' ', $inputStr);
        echo $inputStr;
    } elseif ($inputAction == 'hash'){
        $inputStr = hash('gost', $inputStr);
        echo $inputStr;
    } elseif ($inputAction == 'shuffle'){
        $inputStr = str_shuffle($inputStr);
        echo $inputStr;
    }else{
        echo "Select a valid action!";
    }
}
else{
    echo "Enter a string!";
}
?>
</body>
</html>