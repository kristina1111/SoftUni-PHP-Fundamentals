<?php
namespace AnimalsApp\IO;


class ConsoleIO implements IOInterface
{

    public static function write(string $text)
    {
        echo $text;
    }

    /**
     * @param string $text
     */
    public static function writeLine(string $text)
    {
        echo $text . PHP_EOL;
    }

    /**
     * @return string
     */
    public static function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}