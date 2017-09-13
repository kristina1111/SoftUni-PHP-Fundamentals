<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 10:37 ч.
 */

namespace Entities\Ship;


use Entities\Projectile\PenetrationShell;
use Entities\Projectile\ProjectileInterface;
use Entities\StarSystem\StarSystemInterface;

class Cruiser extends ShipAbstract
{
    const DEFAULT_HEALTH = 100;
    const DEFAULT_SHIELDS = 100;
    const DEFAULT_DAMAGE = 50;
    const DEFAULT_FUEL = 300;

    public function __construct($name, StarSystemInterface $starSystem)
    {
        parent::__construct(self::DEFAULT_HEALTH, self::DEFAULT_SHIELDS, self::DEFAULT_DAMAGE, self::DEFAULT_FUEL, $name, $starSystem);
    }

    public function attack(ShipInterface $ship)
    {
        $this->fireProjectile()->causeDamage($ship);
    }

    public function respondAttack(ProjectileInterface $projectile){
        $projectile->causeDamage($this);
    }

    public function fireProjectile(): ProjectileInterface
    {
        $this->setFiredProjectiles($this->getFiredProjectiles() + 1);
        return new PenetrationShell($this->getDamage());
    }
}