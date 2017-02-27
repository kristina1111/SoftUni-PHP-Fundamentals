<?php
namespace PizzaApp\Entities;

class Dough
{
    const MODIFIERS_FOR_TYPE = array(
        'white' => 1.5,
        'wholegrain' => 1.0);

    const MODIFIERS_FOR_BAKING_TECH = array(
        'crispy' => 0.9,
        'chewy' => 1.1,
        'homemade' => 1.0);

    const CALORIES_PER_GR = 2;
    const MIN_WEIGHT = 1;
    const MAX_WEIGHT = 200;

    private $type;
    private $bakeTech;
    private $weight;
    private $totalCalories;

    /**
     * Dough constructor.
     * @param $type
     * @param $bakeTech
     * @param $weight
     */
    public function __construct(string $type, string $bakeTech, float $weight)
    {
        $this->setType($type);
        $this->setBakeTech($bakeTech);
        $this->setWeight($weight);
        $this->calculateTotalCalories();
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
     * @throws \Exception If type is invalid
     */
    private function setType(string $type)
    {
        if(array_key_exists(strtolower($type), self::MODIFIERS_FOR_TYPE)){
            $this->type = $type;
        }else{
            throw new \Exception("Invalid type of dough.");
        }
    }

    /**
     * @return string
     */
    public function getBakeTech(): string
    {
        return $this->bakeTech;
    }

    /**
     * @param string $bakeTech
     * @throws \Exception If type is invalid
     */
    private function setBakeTech(string $bakeTech)
    {
        if(array_key_exists(strtolower($bakeTech), self::MODIFIERS_FOR_BAKING_TECH)){
            $this->bakeTech = $bakeTech;
        }else{
            throw new \Exception("Invalid baking technique.");
        }

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
     * @throws \Exception If type is invalid
     */
    private function setWeight(float $weight)
    {
        if($weight>=self::MIN_WEIGHT && $weight<=self::MAX_WEIGHT){
            $this->weight = $weight;
        }else{
            throw new \Exception("Dough weight should be in the range [" . self::MIN_WEIGHT . ".." . self::MAX_WEIGHT . "].");
        }
    }

    /**
     * @return mixed
     */
    public function getTotalCalories()
    {
        return $this->totalCalories;
    }

    private function setTotalCalories(float $totalCalories)
    {
        $this->totalCalories = $totalCalories;
    }

    private function calculateTotalCalories()
    {
        $totalCalories = self::CALORIES_PER_GR*$this->getWeight()
            *self::MODIFIERS_FOR_TYPE[strtolower($this->getType())]
            *self::MODIFIERS_FOR_BAKING_TECH[strtolower($this->getBakeTech())];

        $this->setTotalCalories($totalCalories);
    }

    /**
     * @param \PizzaApp\Entities\Pizza $pizza
     */
    public function addToPizza(\PizzaApp\Entities\Pizza $pizza)
    {
        $pizza->addDough($this);
    }

}