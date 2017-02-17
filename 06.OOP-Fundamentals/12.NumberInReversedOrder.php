<?php

$input = trim(fgets(STDIN));
//if(is_numeric($input)){ //Judge doesn't need the check
    $number = new FloatNum($input);
    echo $number->getReversedNumber();
//}

class FloatNum
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getReversedNumber(): string
    {
        $stringNum = strval($this->getNumber());
        $stringNum = strrev($stringNum);
        return $stringNum;
    }
}