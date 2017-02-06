<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Switch-case</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    Enter a word: <input type="text" name="word"/>
    <input type="submit"/>
</form>
<?php
if(isset($_GET['word'])){
    $word = strtolower($_GET['word']);
    switch ($word){
        case "banana":
        case "apple":
        case "kiwi":
        case "cherry":
        case "lemon":
        case "grapes":
        case "peach":
        echo "fruit";
        break;

        case "tomato":
        case "cucumber":
        case "pepper":
        case "onion":
        case "garlic":
        case "parsley":
        echo "vegetable";
        break;

        default:
            echo "unknown";
    }
}
?>
</body>
</html>