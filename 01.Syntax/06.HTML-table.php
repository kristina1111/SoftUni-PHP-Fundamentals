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

        table, td {
            border: 1px solid #808080;
            border-collapse: collapse;
        }

        table td {
            display: inline-block;
            width: 120px;
            text-align: right;
        }

        table td.title {
            background: #ffA500;
            font-weight: 600;
            text-align: left;
        }

    </style>
</head>
<body>
<form>
    First name: <input type="text" name="first-name"/>
    Phone number: <input type="text" name="phone-number"/>
    Age: <input type="text" name="age"/>
    Neighbourhood: <input type="text" name="neighbourhood"/>
    <input type="submit"/>
</form>
<?php
if (isset($_GET['first-name']) && isset($_GET['phone-number']) && isset($_GET['age']) && isset($_GET['neighbourhood'])) {
    $infoArr = array("Name" => $_GET['first-name'], "Phone number" => $_GET['phone-number'], "Age" => $_GET['age'], "Address" => $_GET['neighbourhood']);
    echo "<table>";
    foreach ($infoArr as $key => &$value) {
        echo "<td class='title'>{$key}</td>
                <td>{$value}</td>
                    </tr>";
    }
    echo "</table>";

}
?>
</body>
</html>