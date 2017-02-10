<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sum of digits</title>
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
<form>
    Input string: <input type="text" name="string" placeholder="1111, 2222, 3333, ..." />
    <input type="submit"/>
</form>
<?php
if(isset($_GET['string'])){
    $inputArr = explode(", ", $_GET['string']);
//    $numbers = array_map('trim', explode(',', trim($_GET['numbers']))); ---> for filtering empty inputs, false, null....
    $inputArr = array_filter($inputArr, function ($value){return $value!== "";});
    $numRegex = '/(?<=^)[\d]+(?=$)/'; ?>
    <table>
        <tbody>
        <?php foreach ($inputArr as $value): ?>
            <tr>
                <td>
                    <?= $value ?>
                </td>
                <?php if(preg_match($numRegex, $value)) : ?>
                <td>
                <?php $sum = 0;
                while($value!=0){
                    $sum += $value%10;
                    $value = floor($value/10);
                };
                echo $sum; ?>
                </td>
                <?php else : ?>
                <td>
                    <?= "I cannot sum that" ?>
                </td>
            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php
//    echo "<pre>";
//    print_r($inputArr);
}
?>
</body>
</html>