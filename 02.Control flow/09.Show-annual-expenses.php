<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show annual expenses</title>
    <style>
        form > input {
            display: block;
            margin: 10px;
        }
        table, th, td {
            border: 1px solid #808080;
        }
        table td{
            width: 75px;
            text-align: right;
        }
    </style>
</head>
<body>
<article>
    <form action="">
        <label for="">Enter number of years: </label><input type="text" name="years"/>
        <input type="submit" value="Show costs">
    </form>
</article>
<?php if (isset($_GET['years'])) {
    $numberYears = $_GET['years'];
    ?>
    <table>
        <thead>
        <tr>
            <?php for ($i = 0; $i <= 13; $i++) : ?>
                <?php if ($i == 0) : ?>
                    <th>Year</th>
                <?php elseif ($i == 13) : ?>
                    <th>Total</th>
                <?php else: ?>
                    <th><?= date("F", strtotime("2000-" . $i . "-01")) ?></th>
                <?php endif ?>
            <?php endfor; ?>
        </tr>
        </thead>
        <tbody>
        <?php $totalSumForYear = 0;
        $monthlySum = rand(0, 999);
        for ($i = 0; $i <= $numberYears; $i++) : ?>
            <tr>
            <?php $totalSumForYear = 0;
            for($m = 0; $m<=13; $m++) : ?>
                <?php if ($m == 0) : ?>
                    <td><?= date("Y", strtotime("- {$i} year")); ?></td>
                <?php elseif ($m==13) : ?>
                    <td><?= number_format($totalSumForYear, 0, '.', ' ') ?></td>
                <?php else : ?>
                    <td><?=
                        number_format($monthlySum = rand(0, 1999), 0, '.', ' ') ;
                        $totalSumForYear += $monthlySum;
                        ?></td>
                <?php endif; ?>
            <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
<?php
}
?>
</body>
</html>