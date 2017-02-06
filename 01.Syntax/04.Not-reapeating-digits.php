<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Non-repeating digits</title>
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
    $stringNum = null;
    $isEqual = false;

    if($num<102){
        echo "no";
        return;
    }

    for($i = 102; $i<=987 && $i<=$num; $i++) {
        $stringNum = (string)$i;
        for ($k = 0; $k <= 2; $k++) {
            if(substr_count($stringNum, $stringNum[$k])>1){
                $isEqual = true;
                break;
            }
        }

        if($isEqual){
            $isEqual = false;
            continue;
        }

        if($i!=102){
            echo ", ";
        }
        echo $i;
    }
}
?>
</body>
</html>