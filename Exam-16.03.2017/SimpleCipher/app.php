<?php
//var_dump(chr('119'));
//var_dump(ord('w'));
//exit;

$input = ["string"=>"zibxle-SutFA",
            "key"=>"3"];

//$wordToEncrypt = trim($_GET['string']);
$wordToEncrypt = trim($input['string']);
$length = strlen($wordToEncrypt);
//$step = intval(trim($_GET['key']))%26;
$step = intval(trim($input['key']))%26;
$encryptedWord = [];
$charEncrypted = "";
for($i = 0; $i<$length; $i++){
    $charEncrypted = $wordToEncrypt[$i];
    $valueChar = ord($wordToEncrypt[$i]);
    if($valueChar>=97 && $valueChar<=122){
        $valueChar+=$step;
        if($valueChar>=97 && $valueChar<=122){
            $charEncrypted = chr($valueChar);
        }else{
            $valueChar = $valueChar-122+96;
            $charEncrypted = chr($valueChar);
        }
    }elseif ($valueChar>=65 && $valueChar<=90){
        $valueChar+=$step;
        if($valueChar>=65 && $valueChar<=90){
            $charEncrypted = chr($valueChar);
        }else{
            $valueChar = $valueChar-90+64;
            $charEncrypted = chr($valueChar);
        }
    }
    $encryptedWord[] = $charEncrypted;
}

echo implode('', $encryptedWord);


