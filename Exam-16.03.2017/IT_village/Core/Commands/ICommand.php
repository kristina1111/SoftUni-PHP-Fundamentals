<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 10:47 ч.
 */

namespace Core\Commands;


class ICommand extends CommandAbstract implements CommandInterface
{
    const INN_PRICE_TO_BUY = 100;
    const INN_PRICE_TO_STAY = 10;

    public function execute(){
        if($this->game->getPlayer()->getMoney()>=self::INN_PRICE_TO_BUY){
            $this->game->getPlayer()->spendMoney(self::INN_PRICE_TO_BUY);
            $this->game->getPlayer()->buyInn();
        }else{
            $this->game->getPlayer()->spendMoney(self::INN_PRICE_TO_STAY);
        }
    }
}