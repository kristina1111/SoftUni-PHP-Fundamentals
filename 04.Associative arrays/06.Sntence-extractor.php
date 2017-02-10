<?php
$inputText = trim(fgets(STDIN));
$inputWord  = trim(fgets(STDIN));
$regexSen = '/(?<=[!.?])/';
$regexWord = '/\b'.$inputWord.'\b/';
$inputText = preg_split($regexSen, $inputText, 0, PREG_SPLIT_NO_EMPTY);
foreach ($inputText as $sentence){
    $strLength = strlen($sentence);
    if($sentence[$strLength-1]==="!" || $sentence[$strLength-1]==="?" || $sentence[$strLength-1]==="."){
        if(preg_match($regexWord, $sentence)){
            echo trim($sentence)."\n";
        }
    }
}
?>