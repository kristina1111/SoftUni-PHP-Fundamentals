<?php
namespace PizzaApp\Core\Commands;
use PizzaApp\Entities\Pizza;

class PizzaCommand
{
    /**
     * @param array $args
     * @return Pizza
     * @throws \Exception
     */
    public function execute(array $args = []) : Pizza
    {
        $pizza = null;
        if(count($args)===3){
            $pizza = new Pizza($args[1], $args[2]);
        }else{
            throw new \Exception("Information is not in the proper format");
        }

        return $pizza;
    }
}