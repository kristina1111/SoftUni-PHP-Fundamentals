<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:44 ч.
 */

namespace Entities\Projectile;


use Entities\Ship\ShipInterface;

class ShieldReaver extends ProjectileAbstract
{
    const DEFAULT_SHIELD_DAMAGE_MULTIPLIER = 2;
    public function causeDamage(ShipInterface $ship)
    {
        $ship->setHealth($ship->getHealth() - $this->getDamage());
        $ship->setShields($ship->getShields() - self::DEFAULT_SHIELD_DAMAGE_MULTIPLIER * $this->getDamage());
    }
}