<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rich people's problems</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }

        table, th, td{
            border: 1px solid #808080;
        }
    </style>
</head>
<body>
<article>
    <form action="">
        <label for="">Enter cars: </label><input type="text" name="cars" />
        <input type="submit" value="Show result">
    </form>
</article>
<?php
if(isset($_GET['cars'])){
    $cars = $_GET['cars'];
    $cars = explode(", ", $cars);
//    remove empty entries
    $cars = array_filter($cars, function($value) { return $value !== ''; });
    $colorsArray = ["yellow", "blue", "red", "green", "orange", "purple", "black", "grey", "white"];
//    echo "<pre>";
//    print_r($cars);
    ?>
<table>
    <thead>
    <tr>
        <th>Car</th>
        <th>Color</th>
        <th>Count</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($cars as $car) :?>
            <tr>
                <td><?= $car; ?></td>
                <td><?= $colorsArray[mt_rand(0, count($colorsArray) -1)]; ?></td>
                <td><?= rand(0, 1000); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
}
?>
</body>
</html>