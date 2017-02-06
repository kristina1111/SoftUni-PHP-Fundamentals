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
    <title>Student sorting</title>
    <style>
        form{
            margin: 10px;
        }
        form section{
            margin: 10px;
        }
        table{
            border: 1px solid #808080;
        }

        table thead{
            border: 1px solid #808080;
        }

        table tbody tr:nth-child(odd){
            background: rgba(192,192,192,0.3);
        }

        table td, th {
            padding: 10px;
        }
        table td input{
            padding: 5px;
        }
        table td input.exam-score{
            width: 100px;
        }

        form button {
            background: rgb(35,68,101)!important;
            color: #ffffff!important;
        }

        form button:hover {
            background: #ffffff!important;
            color: rgb(35,68,101)!important;
        }

        #template {
            display: none;
        }

    </style>
</head>
<body>
<form id="form">
    <table>
        <thead>
            <tr>
                <th>First name:</th>
                <th>Second name:</th>
                <th>Email:</th>
                <th>Exam score:</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="firstName[]"/></td>
                <td><input type="text" name="secondName[]"/></td>
                <td><input type="text" name="email[]"/></td>
                <td><input type="text" name="examScore[]" class="exam-score" /></td>
                <td><button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button></td>
            </tr>
            <!-- The template for adding new field -->
            <tr id="template" class="input-container">
                <td><input type="text" name="firstName[]"/></td>
                <td><input type="text" name="secondName[]"/></td>
                <td><input type="text" name="email[]"/></td>
                <td><input type="text" name="examScore[]" class="exam-score" /></td>
                <td><button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button></td>
            </tr>
        </tbody>
    </table>
    <section>
        <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
        <label for="">Sort by: </label>
        <select name="howSort" id="">
            <option value="firstName">First name</option>
            <option value="secondName">Second name</option>
            <option value="email">Email</option>
            <option value="examScore">Exam score</option>
        </select>

        <label for="">Order</label>
        <select name="howOrder" id="">
            <option value="descending">Descending</option>
            <option value="ascending">Ascending</option>
        </select>
        <input type="submit"/>
    </section>

</form>
<?php
print_r($_GET['firstName']);
if(!empty($_GET['firstName']) && !empty($_GET['secondName']) && !empty($_GET['email']) && !empty($_GET['examScore'])){
    echo "YES";
}

class Student{
    public $firstName = "default";
    public $secondName = "default";
    public $email = "default";
    public $examScore = "default";
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