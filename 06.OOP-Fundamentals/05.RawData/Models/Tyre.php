<?php

class Tyre
{
    private $pressure;
    private $age;

    /**
     * Tyre constructor.
     * @param $pressure
     * @param $age
     */
    public function __construct(float $pressure, int $age)
    {
        $this->setPressure($pressure);
        $this->setAge($age);
    }

    /**
     * @return float
     */
    public function getPressure(): float
    {
        return $this->pressure;
    }

    /**
     * @param float $pressure
     */
    private function setPressure(float $pressure)
    {
        $this->pressure = $pressure;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age)
    {
        $this->age = $age;
    }

    public function isPressureUnder1():bool
    {
        return $this->getPressure()<1;
    }


}