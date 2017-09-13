<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:43 ч.
 */

namespace Entities\Projectile;


use Entities\Ship\ShipInterface;

class PenetrationShell extends ProjectileAbstract
{

    public function causeDamage(ShipInterface $ship)
    {
        $ship->setHealth($ship->getHealth() - $this->getDamage());
    }
}