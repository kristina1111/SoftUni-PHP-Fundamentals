<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dump variables</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    Enter variable: <input type="text" name="variable"/>
    <input type="submit"/>
</form>

<!--not working!!!!!!!!!!-->
<?php
if(isset($_GET['variable'])){
    $variable = trim($_GET['variable'], "\'");
    var_dump($variable);
    if(is_numeric($variable)){
        if((int)$variable == (double)$variable){
            var_dump((int)$variable);
        }
        else{
            var_dump((double)$variable);
        }

    }
    else{
        if(is_null($variable)){
            echo "null";
        }
        elseif (is_object($variable))
        {
            echo "object";
        }
        elseif (is_array($variable))
        {
            echo "array";
        }
        elseif (is_string($variable))
        {
            echo "string";
        }
    }

}
?>
</body>
</html>