<?php

class Car
{
    private static $lastId;

    private $id;
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, $weight = "n/a", $color = "n/a")
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
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
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        return $this->getModel() . ":"
            . PHP_EOL
            . $this->getEngine()
            . PHP_EOL
            . "  Weight: " . $this->getWeight()
            . PHP_EOL
            . "  Color: " . $this->getColor();
    }
}