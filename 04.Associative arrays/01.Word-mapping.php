<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Word mapping</title>
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
    $input = strtolower($_GET['input']);
    $re = '/[a-z]+/';
    preg_match_all($re, $input, $matches);
    $wordArr = [];
    foreach ($matches[0] as $match){
        if(!array_key_exists($match, $wordArr)){
            $wordArr[$match] = 1;
        }else{
            $wordArr[$match]+=1;
        }
    } ?>
<table border='2'>
    <?php foreach($wordArr as $key => $value ) : ?>
        <tr>
        <td><?= $key ?></td>
        <td><?= $value ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
}
?>

</body>
</html>