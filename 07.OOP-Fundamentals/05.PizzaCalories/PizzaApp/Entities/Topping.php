<?php

namespace PizzaApp\Entities;

class Topping
{

    const MODIFIERS_FOR_TYPE = array(
        'meat' => 1.2,
        'veggies' => 0.8,
        'cheese' => 1.1,
        'sauce' => 0.9);

    const CALORIES_PER_GR = 2;
    const MIN_WEIGHT = 1;
    const MAX_WEIGHT = 50;

    private $type;
    private $weight;
    private $totalCalories;

    public function __construct(string $type, float $weight)
    {
        $this->setType($type);
        $this->setWeight($weight);
        $this->calculateTotalCalories();
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @throws \Exception If type of topping is invalid
     */
    private function setType($type)
    {
        if(array_key_exists(strtolower($type), self::MODIFIERS_FOR_TYPE)){
            $this->type = $type;
        }else{
            throw new \Exception("Cannot place {$type} on top of your pizza.");
        }

    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     * @throws \Exception If weight is out of the range specified
     */
    private function setWeight($weight)
    {
        if($weight>=self::MIN_WEIGHT && $weight<=self::MAX_WEIGHT){
            $this->weight = $weight;
        }else{
            throw new \Exception($this->getType() . " weight should be in the range [" . self::MIN_WEIGHT . ".." . self::MAX_WEIGHT . "].");
        }

    }

    /**
     * @return mixed
     */
    public function getTotalCalories() : float
    {
        return $this->totalCalories;
    }

    private function setTotalCalories(float $totalCalories)
    {
        $this->totalCalories = $totalCalories;
    }

    /**
     * @internal param mixed $totalCalories
     */
    private function calculateTotalCalories()
    {
        $totalCalories = self::CALORIES_PER_GR
            * self::MODIFIERS_FOR_TYPE[strtolower($this->getType())]
            * $this->getWeight();
        $this->setTotalCalories($totalCalories);
    }

    /**
     * @param Pizza $pizza
     */
    public function addToPizza(Pizza $pizza)
    {
        $pizza->addTopping($this);
    }
}