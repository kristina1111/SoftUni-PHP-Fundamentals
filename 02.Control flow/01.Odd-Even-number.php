<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Odd Even Number</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    Enter number: <input type="text" name="num"/>
    <input type="submit"/>
</form>
<?php
if(isset($_GET['num'])){
    $num = $_GET['num'];
    if(fmod($num, 2) == 0){
        var_dump(fmod($num, 2));
        var_dump(round(fmod($num, 2)));
        echo "even";
    } else if(fmod($num, 2) == round(fmod($num, 2))){
        echo "even";
    } else{
        var_dump(fmod($num, 2));
        var_dump(round(fmod($num, 2)));
        echo "invalid number";
    }
}
?>
</body>
</html>