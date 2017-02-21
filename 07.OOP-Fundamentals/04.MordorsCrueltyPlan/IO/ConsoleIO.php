<?php

namespace IO;


class ConsoleIO implements \IO\IOInterface
{
    /*
     * @param $text mixed
     * @return void
     */
    public static function write($text)
    {
        echo $text;
    }

    /*
     * @param $text mixed
     * @return void
     */
    public static function writeLine($text)
    {
        echo $text . PHP_EOL;
    }

    /*
     * @return string
     */
    public static function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}