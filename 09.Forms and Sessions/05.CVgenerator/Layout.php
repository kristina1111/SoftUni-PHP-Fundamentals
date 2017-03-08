<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV generator</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="CVgeneratorApp/Public/style.css">
    <link rel="stylesheet" href="CVgeneratorApp/Public/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<section id="personal-info-input-container" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-2">
    <?php
    include 'CVgeneratorApp\Views\inputForm.php';
    ?>
</section>
<section id="cv-output-container" class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-10">
    <?php
    include 'CVgeneratorApp\Views\outputCV.php';
    ?>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="CVgeneratorApp/Public/script.js"> </script>
</body>
</html>