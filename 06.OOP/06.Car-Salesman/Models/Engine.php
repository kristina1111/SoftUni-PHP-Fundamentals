<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.2.2017 г.
 * Time: 15:40 ч.
 */
class Engine
{
    private static $lastId;

    private $id;
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct($model, $power, $displacement = "n/a", $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
        $this->id = ++self::$lastId;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @param string $displacement
     */
    public function setDisplacement(string $displacement)
    {
        $this->displacement = $displacement;
    }

    /**
     * @param string $efficiency
     */
    public function setEfficiency(string $efficiency)
    {
        $this->efficiency = $efficiency;
    }

     public function __toString()
     {
         return "  " . $this->getModel() . ":"
             . PHP_EOL
             . "    Power: " . $this->getPower()
             . PHP_EOL
             . "    Displacement: " . $this->getDisplacement()
             . PHP_EOL
             . "    Efficiency: " . $this->getEfficiency();
     }
}