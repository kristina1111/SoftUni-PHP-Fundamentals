<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Count HTML tags</title>
</head>
<body>

<form action="" method="POST">
    <label for="">Enter HTML tag:</label>
    <input type="text" name="tagEntered">
    <input type="submit" name="checkTag" value="Check tag!">

</form>

<?php

const VALID_HTML_TAGS = array("!DOCTYPE","a","abbr","address","area","article","aside","audio","b","base","bdi","bdo","blockquote","body","br","button","canvas","caption","cite","code","col","colgroup","command","datalist","dd","del","details","dfn","div","dl","dt","em","embed","fieldset","figcaption","figure","footer","form","h1", "h2", "h3", "h4", "h5", "h6","head","header","hgroup","hr","html","i","iframe","img","input","ins","kbd","keygen","label","legend","li","link","map","mark","menu","meta","meter","nav","noscript","object","ol","optgroup","option","output","p","param","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","small","source","span","strong","style","sub","summary","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","u","ul","var","video","wbr");

session_start();
if(!isset($_SESSION['validTagsNum'])) {
    $_SESSION['validTagsNum'] = 0;
}
if (isset($_POST['checkTag'])){
    if(in_array(strtolower($_POST['tagEntered']), VALID_HTML_TAGS)){
        $_SESSION['validTagsNum']++;
        echo "<h1>Valid HTML tag!</h1>";
    }else{
        echo "<h1>Invalid HTML tag!</h1>";
    }

    echo "<h2>Score: {$_SESSION['validTagsNum']}</h2>";
}
?>
</body>
</html>
