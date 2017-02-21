<?php

namespace IO;

interface IOInterface
{
    /*
     * @param $text mixed
     * @return void
     */
    public static function write($text);

    /*
     * @param $text mixed
     * @return void
     */
    public static function writeLine($text);

    /*
     * @return string
     */
    public static function readLine() : string;
}