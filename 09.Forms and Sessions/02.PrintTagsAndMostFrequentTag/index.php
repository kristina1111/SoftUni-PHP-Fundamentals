<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tags</title>
    <style>
        ol {
            list-style: none;
        }

        li:before {
            counter-increment: mycounter;
            content: counter(mycounter) ": ";
        }

        li:first-of-type {
            counter-reset: mycounter -1;
        }

    </style>
</head>
<body>
<form method="POST" action="">
    <label for="">Enter tags</label>
    <input type="text" name="tags">
    <input type="submit" name="submitTags">
</form>
<ol>
    <?php
    session_start();
    if (!isset($_SESSION['tags'])) {
        $_SESSION['tags'] = array();
    }
    if (isset($_POST['tags']) && isset($_POST['submitTags'])){
    $info = explode(', ', trim($_POST['tags']));
    $_SESSION['tags'] = array_merge($_SESSION['tags'], $info);
    $tagCounter = [];
    foreach ($_SESSION['tags'] as $tag) {
        if (!array_key_exists($tag, $tagCounter)) {
            $tagCounter[$tag] = 0;
        }
        $tagCounter[$tag] += 1;
        ?>
        <li>
            <?= $tag; ?>
        </li>
    <?php } ?>


    <?php
    //print_r($tagCounter);

    //Sort the associative array in descending order by value
    uasort($tagCounter, function ($a, $b) {
        return $b > $a;
    });
    array_keys($tagCounter);
    //print_r($tagCounter);
    ?>
</ol>
<h1>The most repeated tag is:</h1>
<!--Once the array is sorted, take the first element key and then its value-->
<h2><?= array_keys($tagCounter)[0] ?> : <?= $tagCounter[array_keys($tagCounter)[0]]; ?> times</h2>
<?php
}
?>

</body>
</html>
