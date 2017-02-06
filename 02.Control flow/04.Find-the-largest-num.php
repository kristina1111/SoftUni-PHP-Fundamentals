<!--Combined solution for Part I, exercises 2, 3, 4!!!-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Find the largest number</title>
    <style>
        article{
            margin: 10px;
        }

        #template {
            display: none;
        }

    </style>
</head>
<body>
<form id="form">
    <article>
        <span>Enter a number: </span><input type="text" name="number[]"/>
        <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
    </article>
    <!-- The template for adding new field -->
    <article id="template" class="input-container">
        <span>Enter a number: </span><input type="text" name="number[]"/>
        <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
    </article>

    <input type="submit"/>
</form>
<?php
if(isset($_GET['number'])){
    $numsArray = $_GET['number'];
    $maxNum = null;
    $isNumber = true;
    for($x=0; $x<count($numsArray)-1; $x++) {
        $regex = '/(?<=^)((^[-]?[1-9][\d]*([,\ ]?[\d]{3})*)|([-]?[0]))([.]{1}[\d]+)?(?=$)/';
        if(!preg_match($regex,$numsArray[$x])){
            continue;
        }

        if($isNumber){
            $maxNum = $numsArray[$x];
            $isNumber = false;
        }

        if($maxNum<$numsArray[$x]){
            $maxNum = $numsArray[$x];
        }
    }

    if($maxNum==null){
        echo "Enter a valid number!";
    }
    else{
        echo "The greatest number is {$maxNum}.";
    }


}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    var counter = 0;
    $('#form').on('click', '.addButton', function() {
        counter++;
        var $template = $('#template'),
            $clone    = $template
                .clone()
                .removeAttr('id')
                .attr('data-book-index', counter)
                .insertBefore($template);

        // Update the name attributes
        $clone
            .find('[name="number"]').attr('name', 'number-' + counter).end()
    })

    // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row  = $(this).parents('.input-container'),
                index = $row.attr('data-book-index');

            // Remove element containing the fields
            $row.remove();
        });
</script>
</body>
</html>