<?php
namespace PizzaApp\IO;

interface IOInterface
{
    /*
     * @param $text mixed
     * @return void
     */
    public static function write(string $text);

    /*
     * @param $text mixed
     * @return void
     */
    public static function writeLine(string $text);

    /*
     * @return string
     */
    public static function readLine() : string ;
}