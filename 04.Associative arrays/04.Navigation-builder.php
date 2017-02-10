<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coloring texts</title>
    <style>
        input {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<form>
    <label for="">Categories: </label><input type="text" name="categories" />
    <label for="">Tags: </label><input type="text" name="tags" />
    <label for="">Months: </label><input type="text" name="months" />
    <input type="submit" value="Generate" />
</form> <br>
<?php
if (isset($_GET['categories']) && isset($_GET['tags']) && isset($_GET['months'])){
    $inputArr = array('Categories' => $_GET['categories'], 'Tags' => $_GET['tags'], 'Months' => $_GET['months']);
    foreach($inputArr as $key => $value){
        echo "<h2>{$key}</h2>";
        $innerArr = explode(", ", $value); ?>
        <ul>
        <?php foreach ($innerArr as $valueIn) : ?>
            <li><?= trim($valueIn) ?></li>
        <?php endforeach; ?>
        </ul>
        <?php
    }
}
?>

</body>
</html>