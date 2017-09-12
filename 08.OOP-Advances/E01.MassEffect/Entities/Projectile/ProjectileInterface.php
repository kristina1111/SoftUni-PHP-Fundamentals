<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:29 ч.
 */

namespace Entities\Projectile;


use Entities\Ship\ShipInterface;

interface ProjectileInterface
{
    public function getDamage() : int;
    public function setDamage(int $damage);

    public function causeDamage(ShipInterface $ship);
}