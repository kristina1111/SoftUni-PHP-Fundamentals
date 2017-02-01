<!--Combined solution for Part I, exercises 5, 6 !!!-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Count the letters</title>
    <style>
        article{
            margin: 10px;
        }

    </style>
</head>
<body>
<form id="form">
    <article>
        <span>Enter a word: </span><input type="text" name="word"/>
    </article>

    <input type="submit"/>
</form>
<?php
if(isset($_GET['word'])){
    $word = $_GET['word'];
    $wordLength = mb_strlen($word, 'UTF-8');
    $uniqueCharArray = array();
    for($i = 0; $i< $wordLength; $i++){
        $char = mb_substr($word, $i, 1, 'UTF-8');
        if(!array_key_exists($char, $uniqueCharArray)){
            $uniqueCharArray[$char] = 0;
        }
        $uniqueCharArray[$char]++;
    }

    function sortArray ($array){
        $keys = array();
        $values = array();

        foreach ($array as $key => $value){
            $keys[] = $key; // adds value at the end of the array (like array_push)
            $values[] = $value;
        }

        array_multisort($values, SORT_DESC, $values, SORT_ASC, $array);
        return $array;
    }

    $uniqueCharArray = sortArray($uniqueCharArray);

    echo "<pre>";
    print_r($uniqueCharArray);
}
?>
</body>
</html>