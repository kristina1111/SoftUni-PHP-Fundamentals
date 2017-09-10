<?php

$input = explode(', ', trim(fgets(STDIN)));

$output = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<quiz>';
for($i = 0; $i<count($input); $i+=2){
    $output .= createTemplate($input[$i], $input[$i + 1]);
}
$output .= PHP_EOL . '</quiz>';
echo $output;


function createTemplate($question, $answer){
    return PHP_EOL . '  <question>'.PHP_EOL
        .'    '. $question . PHP_EOL
        .'  </question>'.PHP_EOL
        .'  <answer>'.PHP_EOL
        .'    '. $answer . PHP_EOL
        .'  </answer>';
}