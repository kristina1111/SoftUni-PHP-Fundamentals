<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lazy Sunday</title>
    <style>
        form>input{
            display: block;
            margin: 10px;
        }
    </style>
</head>
<body>
<form>
    <span>Enter date and time:</span>
    <input data-format="dd-MM-yyyy hh:mm:ss" type="text" name="time" placeholder="dd/MM/yyyy hh:mm:ss">

    <input type="submit"/>
</form>
<?php
if (isset($_GET['time'])) {
    $re = '/(?<=^)[\d]{2}[-][\d]{2}[-][\d]{4}\s[\d]{2}[:][\d]{2}[:][\d]{2}(?=$)/';
    $time = $_GET['time'];

    if(preg_match($re, $time)){
        $yearRegex = '/(?<=-)[\d]{4}(?=\s)/';
        $year = preg_match($yearRegex, $time, $matches);
        $endYear = "31-12-2000 23:59:59";
        $endYear = preg_replace($yearRegex, $matches[0], $endYear);
        $time = new DateTime($time);
        $endYear = new DateTime($endYear);
        $diff = $endYear->diff($time);
        $hours = number_format($diff->days*24 + $diff->h + floor($diff->i/60) + floor($diff->s/60/60), 0, ',', ' ');

        echo "Hours until new year : {$hours}</br>";

        $minutes = number_format($diff->days*24*60 + $diff->h*60 + $diff->i + floor($diff->s/60), 0, ',', ' ');

        echo "Minutes until new year : {$minutes}</br>";

        $seconds = number_format($diff->days*24*60*60 + $diff->h*60*60 + $diff->i*60 + $diff->s, 0, ',', ' ');

        echo "Seconds until new year : {$seconds}</br>";
        echo "Days:Hours:Minutes:Seconds {$diff->days}:{$diff->h}:{$diff->i}:{$diff->s}";

    }
    else{
        echo "Enter valid date and time!";
    }
}
else{
    echo "Enter date and time";
}
?>
</body>
</html>