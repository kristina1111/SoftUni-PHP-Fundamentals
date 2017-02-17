<?php

class Car
{
    private $speedKmH;
    private $fuelAmount;
    private $fuelEconomyPer100km;
    private $distanceTravelled;
    private $timeTravelled;

    public function __construct(float $speedKmH, float $fuelAmount, float $fuelEconomyPer100km, float $distanceTravelled = 0.0, float $timeTravelled = 0.0)
    {
        $this->speedKmH = $speedKmH;
        $this->fuelAmount = $fuelAmount;
        $this->fuelEconomyPer100km = $fuelEconomyPer100km;
        $this->distanceTravelled = $distanceTravelled;
        $this->timeTravelled = $timeTravelled;
    }

    /**
     * @return float
     */
    public function getSpeedKmH(): float
    {
        return $this->speedKmH;
    }

    /**
     * @param float $speedKmH
     */
    private function setSpeedKmH(float $speedKmH)
    {
        $this->speedKmH = $speedKmH;
    }

    /**
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    /**
     * @param float $fuelAmount
     */
    private function setFuelAmount(float $fuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelEconomyPer100km(): float
    {
        return $this->fuelEconomyPer100km;
    }

    /**
     * @param float $fuelEconomyPer100km
     */
    private function setFuelEconomyPer100km(float $fuelEconomyPer100km)
    {
        $this->fuelEconomyPer100km = $fuelEconomyPer100km;
    }

    /**
     * @return float
     */
    public function getDistanceTravelled(): float
    {
        return $this->distanceTravelled;
    }

    /**
     * @param float $distance
     */
    public function setDistanceTravelled(float $distance)
    {
        $this->distanceTravelled = $distance;
    }

    /**
     * @return float
     */
    public function getTimeTravelled(): float
    {
        return $this->timeTravelled;
    }

    /**
     * @param float $timeTravelled
     */
    public function setTimeTravelled(float $timeTravelled)
    {
        $this->timeTravelled = $timeTravelled;
    }


    public function increaseTimeSpent($timeSpent){
        $this->setTimeTravelled($this->getTimeTravelled()+$timeSpent);
    }

    public function decreaseFuelAmount(float $fuel){
        $this->setFuelAmount($this->getFuelAmount()-$fuel);
    }

    public function increaseDistanceTravelled(float $distance){
        $this->setDistanceTravelled($this->getDistanceTravelled()+$distance);
    }

    public function travel(float $distance){
        $fuelNeeded = ($distance/100)*$this->getFuelEconomyPer100km();
        $distanceAbleToPass = ($this->getFuelAmount()/$this->getFuelEconomyPer100km())*100;
        if($fuelNeeded>$this->fuelAmount){
            $fuelNeeded = $this->getFuelAmount();
        }

        if($distanceAbleToPass>$distance){
            $distanceAbleToPass = $distance;
        }

        $timeSpent = ($distanceAbleToPass/$this->getSpeedKmH())*3600; //in seconds

        $this->decreaseFuelAmount($fuelNeeded);
        $this->increaseDistanceTravelled($distanceAbleToPass);
        $this->increaseTimeSpent($timeSpent);

    }

    public function refuelCar(float $fuelAmount){
        $this->setFuelAmount($this->getFuelAmount()+$fuelAmount);
    }

}