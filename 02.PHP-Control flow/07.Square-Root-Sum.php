<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Square roots sum</title>
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
<table>
    <thead>
        <tr>
            <th>
                Number
            </th>
            <th>
                Square root
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $sumSqrt = 0; for($i=0; $i<=100; $i+=2): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?=  round(sqrt($i), 2) ?></td>
            <?php  $sumSqrt += round(sqrt($i), 2);  ?>
        </tr>
        <?php endfor; ?>
        <tr>
            <td>Sum</td>
            <td><?= $sumSqrt ?></td>
        </tr>
    </tbody>

</table>
</body>
</html>