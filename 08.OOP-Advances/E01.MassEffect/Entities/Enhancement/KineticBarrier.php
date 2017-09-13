<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:58 ч.
 */

namespace Entities\Enhancement;


use Entities\Ship\ShipInterface;

class KineticBarrier extends EnhancementAbstract
{
    const DEFAULT_BONUS_SHILEDS = 100;

    public function giveBonus(ShipInterface $ship)
    {
        $ship->setShields($ship->getShields() + self::DEFAULT_BONUS_SHILEDS);
    }
}