<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:59 ч.
 */

namespace Entities\Enhancement;


use Entities\Ship\ShipInterface;

class ExtendedFuelCells extends EnhancementAbstract
{
    const DEFAULT_BONUS_FUEL = 200;

    public function giveBonus(ShipInterface $ship)
    {
        $ship->setFuel($ship->getFuel() + self::DEFAULT_BONUS_FUEL);
    }
}