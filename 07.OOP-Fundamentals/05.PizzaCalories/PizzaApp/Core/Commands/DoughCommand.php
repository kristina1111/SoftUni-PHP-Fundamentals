<?php
namespace PizzaApp\Core\Commands;
use PizzaApp\Entities\Dough;

class DoughCommand extends CommandAbstract
{

    /**
     * @param array $args
     * @return Dough
     * @throws \Exception
     */
    public function execute(array $args = []) : Dough
    {
        $dough = null;
        if(count($args)===4){
            $dough = new Dough($args[1], $args[2], $args[3]);
        }else{
            throw new \Exception("Information is not in the proper format");
        }

        return $dough;
    }
}