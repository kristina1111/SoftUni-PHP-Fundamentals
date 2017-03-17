<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 10:51 ч.
 */

namespace Core\Commands;


class VCommand extends CommandAbstract implements CommandInterface
{
    const MONEY_FOR_FREELANCE_JOB = 0;
    const MULTIPLIER_FOR_MONEY = 10;

    public function execute()
    {
        $this->game->getPlayer()->earnMoney(self::MONEY_FOR_FREELANCE_JOB, self::MULTIPLIER_FOR_MONEY);
    }
}