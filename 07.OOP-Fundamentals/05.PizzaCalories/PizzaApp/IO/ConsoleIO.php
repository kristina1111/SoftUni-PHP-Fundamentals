<?php

namespace PizzaApp\IO;

class ConsoleIO implements IOInterface
{


    public static function writeLine(string $text)
    {
        echo $text . PHP_EOL;
    }

    public static function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    public static function write(string $text)
    {
        echo $text;
    }
}