<?php

class Engine
{
    private $speed;
    private $power;

    /**
     * Engine constructor.
     * @param $speed
     * @param $power
     */
    public function __construct(float $speed, float $power)
    {
        $this->setSpeed($speed);
        $this->setPower($power);
    }

    /**
     * @return float
     */
    public function getSpeed(): float
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     */
    private function setSpeed(float $speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return float
     */
    public function getPower(): float
    {
        return $this->power;
    }

    /**
     * @param float $power
     */
    private function setPower(float $power)
    {
        $this->power = $power;
    }

    public function isPowerOver250() : bool
    {
        return $this->getPower()>250;
    }



}