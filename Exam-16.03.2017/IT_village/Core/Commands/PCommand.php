<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 10:47 ч.
 */

namespace Core\Commands;


class PCommand extends CommandAbstract implements CommandInterface
{
    const COCKTAIL_PRICE = 5;
    public function execute()
    {
        $this->game->getPlayer()->spendMoney(self::COCKTAIL_PRICE);
    }
}