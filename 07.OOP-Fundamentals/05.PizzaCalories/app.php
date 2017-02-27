<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';
    require_once $class;
});

$input = explode(' ', PizzaApp\IO\ConsoleIO::readLine());

$cmd = "PizzaApp\\Core\\Commands\\" . ucfirst(strtolower($input[0])) . "Command";
try{
    $pizzaInstance = new $cmd;
    $pizza = $pizzaInstance->execute($input);
    $input = explode(' ', PizzaApp\IO\ConsoleIO::readLine());
    while (strtolower($input[0])!="end"){
        $cmd = "PizzaApp\\Core\\Commands\\" . ucfirst(strtolower($input[0])) . "Command";
        $foodInstance = new $cmd();
        $food = $foodInstance->execute($input);
        $food->addToPizza($pizza);

        $input = explode(' ', PizzaApp\IO\ConsoleIO::readLine());
    }
    PizzaApp\IO\ConsoleIO::write($pizza);
}catch (\Exception $e){
    PizzaApp\IO\ConsoleIO::write($e->getMessage());
}
