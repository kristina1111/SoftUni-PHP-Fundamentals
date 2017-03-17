<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 10:48 ч.
 */

namespace Core\Commands;


class SCommand extends CommandAbstract implements CommandInterface
{
    const MOVES_TO_SKIP = 2;
    public function execute()
    {
        $this->game->changeCounterMoves(self::MOVES_TO_SKIP);
    }
}