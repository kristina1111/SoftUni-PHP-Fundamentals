<?php

$input = trim(fgets(STDIN));
if(is_numeric($input)){
    $number = new Number(intval($input));
    echo $number->getLastDigitName();
}

class Number
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getNumber():int
    {
        return $this->number;
    }
    public function getLastDigitName():string
    {
        $lastDigit = $this->getNumber()%10;
        $output = "";
        switch ($lastDigit){
            case 0:
                $output = "zero";
                break;
            case 1:
                $output = "one";
                break;
            case 2:
                $output = "two";
                break;
            case 3:
                $output = "three";
                break;
            case 4:
                $output = "four";
                break;
            case 5:
                $output = "five";
                break;
            case 6:
                $output = "six";
                break;
            case 7:
                $output = "seven";
                break;
            case 8:
                $output = "eight";
                break;
            case 9:
                $output = "nine";
                break;
        }

        return $output;
    }
}