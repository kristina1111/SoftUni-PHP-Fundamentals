<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML Table</title>
    <style>
        form > input {
            display: block;
            margin: 10px;
        }
        form > input[type="radio"] {
            display: inline-block;
        }

    </style>
</head>
<body>
<form>
    First name: <input type="text" name="first-name"/>
    Age: <input type="text" name="age"/>
    <input type="radio" name="gender" value="male" checked> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
    <input type="submit"/>
</form>
<?php
if (isset($_GET['first-name']) && isset($_GET['age']) && isset($_GET['gender'])) {
    $name = $_GET['first-name'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];

    echo "My name is {$name}. I ame {$age} years old. I am {$gender}.";
}
?>
</body>
</html>