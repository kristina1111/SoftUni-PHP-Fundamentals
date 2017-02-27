<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

$inputAuthor = explode(' ', trim(fgets(STDIN)));
$inputTitle = trim(fgets(STDIN));
$inputPrice = floatval(trim(fgets(STDIN)));
$inputType = trim(fgets(STDIN));

$book = null;
try{
    if(strtolower($inputType) == "standard"){
        $book = new \BookShopApp\Entities\Books\Standard($inputAuthor, $inputTitle, $inputPrice);
    }elseif (strtolower($inputType) == "gold"){
        $book = new \BookShopApp\Entities\Books\Gold($inputAuthor, $inputTitle, $inputPrice);
    }else{
        throw new \Exception("Type is not valid!");
    }

    echo $book;
}catch (\Exception $e){
    echo $e->getMessage();
}
