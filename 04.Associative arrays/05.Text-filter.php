<?php
$inputText = trim(fgets(STDIN));
$inputArrWords  = explode(', ', trim(fgets(STDIN)));
foreach ($inputArrWords as $word){
    $replacement = str_repeat("*", strlen($word));
    $inputText = str_replace($word, $replacement, $inputText);
//    $regex = '/'.$word.'/';
//    $inputText = preg_replace($regex, $replacement, $inputText);
}
echo $inputText;
?>