<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:51 ч.
 */

namespace Entities\Enhancement;


use Entities\Ship\ShipInterface;

class ThanixCannon extends EnhancementAbstract
{
    const DEFAULT_BONUS_DAMAGE = 50;

    public function giveBonus(ShipInterface $ship)
    {
        // TODO: Implement giveBonus() method.
    }
}