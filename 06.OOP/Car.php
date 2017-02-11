<?php

class Car
{
    private static $lastId;

    private $id;
    private $model;
    private $fuelAmount;
    private $fuelCostPerKm;
    private $distancePassed;

    function __construct(string $model, float $fuelAmount, float $fuelCostPerKm, float $distancePassed = 0.0)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCostPerKm = $fuelCostPerKm;
        $this->distancePassed = $distancePassed;
        $this->id = ++self::$lastId;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return float
     */
    public function getFuelAmount(): float
    {
        return $this->fuelAmount;
    }

    /**
     * @return float
     */
    public function getFuelCostPerKm(): float
    {
        return $this->fuelCostPerKm;
    }

    /**
     * @return float
     */
    public function getDistancePassed(): float
    {
        return $this->distancePassed;
    }

    /**
     * @param float $fuelAmount
     */
    public function setFuelAmount(float $fuelAmount)
    {
        $this->fuelAmount = $fuelAmount;
    }

    /**
     * @param float $fuelCostPerKm
     */
    public function setFuelCostPerKm(float $fuelCostPerKm)
    {
        $this->fuelCostPerKm = $fuelCostPerKm;
    }

    /**
     * @param float $distancePassed
     */
    public function setDistancePassed(float $distancePassed)
    {
        $this->distancePassed = $distancePassed;
    }

    public function increaseDistancePassed(float $distancePassed)
    {
        $this->distancePassed += $distancePassed;
    }

    public function decreaseFuelAmount(float $fuelAmount)
    {
        $this->fuelAmount -= $fuelAmount;
    }

    public function canBeDriven(float $kmToPass) : bool
    {
        return $this->fuelAmount/$this->fuelCostPerKm >=$kmToPass;
    }

    public function afterDriving(float $kmToPass)
    {
        $this->increaseDistancePassed($kmToPass);
        $this->decreaseFuelAmount($kmToPass*$this->getFuelCostPerKm());
    }
}