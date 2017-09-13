<?php

spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

$game = new Game\Game(new \Entities\Galaxy\Galaxy());
$game->start();