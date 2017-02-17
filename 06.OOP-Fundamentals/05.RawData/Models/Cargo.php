<?php

class Cargo
{
    private $weight;
    private $type;

    /**
     * Cargo constructor.
     * @param $weight
     * @param $type
     */
    public function __construct(float $weight, string $type)
    {
        $this->setWeight($weight);
        $this->setType($type);
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    private function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type)
    {
        $this->type = $type;
    }




}