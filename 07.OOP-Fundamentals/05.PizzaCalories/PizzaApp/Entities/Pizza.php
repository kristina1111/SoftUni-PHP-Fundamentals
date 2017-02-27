<?php
namespace PizzaApp\Entities;

use PizzaApp\Entities\Dough;
use PizzaApp\Entities\Topping;

class Pizza
{
    const MIN_SYM_FOR_NAME = 1;
    const MAX_SYM_FOR_NAME = 15;

    const MIN_NUM_TOPPINGS = 0;
    const MAX_NUM_TOPPINGS = 10;

    private $name;
    private $numTops;
    private $dough;
    private $toppings;

    /**
     * Pizza constructor.
     * @param string $name
     * @param int $numTops
     * @param Dough $dough
     * @param array $toppings
     */
    public function __construct(string $name, int $numTops, Dough $dough = null, array $toppings = [])
    {
        $this->setName($name);
        $this->setNumTops($numTops);
        $this->dough = $dough;
        $this->toppings = $toppings;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @throws \Exception If pizza name is not valid
     */
    private function setName($name)
    {
        if(strlen($name)>=self::MIN_SYM_FOR_NAME && strlen($name)<=self::MAX_SYM_FOR_NAME){
            $this->name = $name;
        }else{
            throw new \Exception("Pizza name should be between " . self::MIN_SYM_FOR_NAME
                . " and " . self::MAX_SYM_FOR_NAME . " symbols.");
        }
    }

    /**
     * @return mixed
     */
    public function getNumTops()
    {
        return $this->numTops;
    }

    /**
     * @param mixed $numTops
     * @throws \Exception If number of toppings is not in the range specified
     */
    private function setNumTops(int $numTops)
    {
        if($numTops>=self::MIN_NUM_TOPPINGS && $numTops<=self::MAX_NUM_TOPPINGS){
            $this->numTops = $numTops;
        }else{
            throw new \Exception("Number of toppings should be in range ["
                . self::MIN_NUM_TOPPINGS . ".." . self::MAX_NUM_TOPPINGS . "].");
        }
    }

    /**
     * @return mixed
     */
    public function getDough()
    {
        return $this->dough;
    }

    /**
     * @param Dough $dough
     */
    public function setDough($dough)
    {
        $this->dough = $dough;
    }

    /**
     * @return mixed
     */
    public function getToppings()
    {
        return $this->toppings;
    }

    /**
     * @param mixed $toppings
     */
    private function setToppings($toppings)
    {
        $this->toppings = $toppings;
    }

    /**
     * @param \PizzaApp\Entities\Topping $topping
     * @throws \Exception If more topping than first declared is added
     */
    public function addTopping(Topping $topping)
    {
        if(count($this->getToppings())<$this->getNumTops()){
            $this->toppings[] = $topping;
        }else{
            throw new \Exception("You can't add more topping.");
        }
    }

    public function addDough(Dough $dough){
        if($this->getDough()===null){
            $this->setDough($dough);
        }else{
            throw new \Exception("You can't add more dough.");
        }
    }

    /**
     * @return float
     */
    public function getTotalCallories() : float
    {
        $totalCalories = 0.0;
        $totalCalories += $this->getDough()->getTotalCalories();
        /** @var Topping $topping */
        foreach ($this->getToppings() as $topping){
            $totalCalories += $topping->getTotalCalories();
        }

        return $totalCalories;
    }

    public function __toString()
    {
        $output = ucfirst($this->getName()) . " - " . number_format($this->getTotalCallories(), 2, '.', '') . " Calories.";
        return $output;
    }

}