<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lazy sunday</title>
    <style>
        form > input {
            display: block;
            margin: 10px;
        }
    </style>

</head>
<body>
<form>
    Enter month and year: <input type="month" name="month-year">
    <input type="submit"/>
</form>
<?php
if(isset($_GET['month-year'])){
    $beginDate = $_GET['month-year'] . '-01';
    $dateArray = explode('-', $beginDate);
    if($dateArray[1]==12){
        $dateArray[0] +=1;
        $dateArray[1] = 1;
    }
    else{
        $dateArray[1] +=1;
    }

    $beginDate = new DateTime($beginDate);
    $endDate = new DateTime(implode('-', $dateArray));

    echo "<div>Here are all sundays in that month:</div>";
    while ($beginDate < $endDate) // Loop will work begin to the end date
    {
        if($beginDate->format('D') == 'Sun') //Check that the day is Sunday here
        {
            echo "<div> {$beginDate->format('jS F, Y')}</div>";
        }

        $beginDate->modify('+1 day');
    }
}
?>
</body>
</html>