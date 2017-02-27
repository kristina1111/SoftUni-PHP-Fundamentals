<?php
namespace PizzaApp\Core\Commands;
use PizzaApp\Entities\Topping;

class ToppingCommand extends CommandAbstract
{

    /**
     * @param array $args
     * @return Topping
     * @throws \Exception
     */
    public function execute(array $args = []): Topping
    {
        $topping = null;
        if(count($args)==3){
            $topping = new Topping($args[1], $args[2]);
        }else{
            throw new \Exception("Information is not in the proper format");
        }

        return $topping;
    }
}