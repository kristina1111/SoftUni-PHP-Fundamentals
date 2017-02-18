<?php

$start = intval(trim(fgets(STDIN)));
$end = intval(trim(fgets(STDIN)));

$fibonacci = new Fibonacci();
$fibonacci->addNumber($end);
echo trim(implode(', ', $fibonacci->showNumbers($start, $end)), ', ');


class Fibonacci
{
    private $numbers;


    public function __construct(array $numbers = [])
    {
        $this->numbers = $numbers;
    }

    public function getNumbers(): array {
        return $this->numbers;
    }

    private function setNumbers(array $numbers){
        $this->numbers = $numbers;
    }

    public function addNumber(int $number)
    {
        if($number==1){
            $this->numbers[] = 0;
        }elseif($number==2){
            $this->setNumbers([0, 1]);
        }
        if($number>2){
            $this->setNumbers([0, 1]);
            for($i=2; $i<$number; $i++){
                $this->numbers[] = $this->numbers[$i-1]+$this->numbers[$i-2];
            }
        }

    }

    public function showNumbers(int $start, int $end): array {
        $output = [];
        if($start>=$end){
            throw new Exception("Not valid start and end positions!");
        }else{
            for($i = $start; $i<$end; $i++){
                $output[] = $this->getNumbers()[$i];
            }
        }

        return $output;

    }


}