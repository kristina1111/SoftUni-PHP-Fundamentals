<?php
$input = strtolower(trim(fgets(STDIN)));
for($i = 0; $i<strlen($input); $i++){
    $asciiCode = ord($input[$i])-97;
    echo "{$input[$i]} -> {$asciiCode}\n";
}
?>