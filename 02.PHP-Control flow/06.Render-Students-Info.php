<!--Solution for Part II, exercise 7 -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Render Students Info</title>
    <style>
        form > input {
            display: block;
            margin: 10px;
        }

        article {
            margin: 10px;
        }

        table, th, td{
            border: 1px solid #808080;
        }
    </style>
</head>
<body>
<form>
    <article>
        <label>Choose delimiter: </label>
        <select name="delimiter">
            <option value="," selected="selected">,</option>
            <option value="|">|</option>
            <option value="&">&</option>
        </select>
    </article>
    <article>
        <label>Enter names of students, separated by ",", "|" or "&": </label>
        <input type="text" name="names">
    </article>
    <article>
        <label>Enter ages of students, separated by ",", "|" or "&": </label>
        <input type="text" name="ages">
    </article>

    <input type="submit" value="Filter"/>
</form>
<?php
if (isset($_GET['names']) && isset($_GET['ages']) && isset($_GET['delimiter'])) {
    $names = $_GET['names'];
    $ages = $_GET['ages'];
    $delimiter = $_GET['delimiter'];
    $regex = '/(?<=^)[\w ]+(?:[,][\w ]+)*(?=$)/';

    if (preg_match($regex, $names) && preg_match($regex, $ages)) {
        $names = explode($delimiter, $names);
        $ages = explode($delimiter, $ages);
        if (count($names) == count($ages)) {
            $arrayInfo = array_combine($names, $ages);
//            echo "<pre>";
//            print_r($arrayInfo);
            ?>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($arrayInfo as $key => $value) : ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $value; ?></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "Enter equal number of names and ages";
        }

    } else {
        echo "Enter valid names and ages";
    }

}
?>
</body>
</html>