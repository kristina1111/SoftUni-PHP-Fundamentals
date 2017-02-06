<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal info</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    First name: <input type="text" name="first-name"/>
    Last name: <input type="text" name="last-name"/>
    Age: <input type="text" name="age"/>
    <input type="submit"/>
</form>
<?php
if(isset($_GET['first-name']) && isset($_GET['last-name']) && isset($_GET['age'])){
    $firstName = $_GET['first-name'];
    $lastName = $_GET['last-name'];
    $fullName = $firstName . ' ' . $lastName;
    $age = $_GET['age'];
    echo "My name is {$fullName} and I am {$age} years old.";
}
?>
</body>
</html>