<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coloring texts</title>
    <style>
        textarea {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<form>
    <textarea name="input" id="" cols="30" rows="3"></textarea>
    <input type="submit" name="submit-textarea" value="Count words">
</form> <br>
<?php
if (isset($_GET['input'])){
    $input = explode(' ', $_GET['input']);
    $input = implode('', $input);
    for($i=0; $i<strlen($input); $i++){
        if(ord($input[$i])%2===1){
            echo "<font color='blue'>{$input[$i]} </font>";
        }else{
            echo "<font color='red'>{$input[$i]} </font>";
        }
    }
}
?>

</body>
</html>