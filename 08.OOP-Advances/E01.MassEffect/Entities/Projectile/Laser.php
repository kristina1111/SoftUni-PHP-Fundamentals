<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:42 ч.
 */

namespace Entities\Projectile;


use Entities\Ship\ShipInterface;

class Laser extends ProjectileAbstract
{

    public function causeDamage(ShipInterface $ship)
    {
        $damageLeft = max(0, $this->getDamage() - $ship->getShields());
        $ship->setShields($ship->getShields() - $this->getDamage());
        $ship->setHealth($ship->getHealth() - $damageLeft);
    }
}