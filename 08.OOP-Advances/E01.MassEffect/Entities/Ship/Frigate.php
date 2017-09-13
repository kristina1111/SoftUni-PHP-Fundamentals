<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 22:27 ч.
 */

namespace Entities\Ship;


use Entities\Projectile\ProjectileInterface;
use Entities\Projectile\ShieldReaver;
use Entities\StarSystem\StarSystemInterface;

class Frigate extends ShipAbstract
{
    const DEFAULT_HEALTH = 60;
    const DEFAULT_SHIELDS = 50;
    const DEFAULT_DAMAGE = 30;
    const DEFAULT_FUEL = 220;

    public function __construct($name, StarSystemInterface $starSystem)
    {
        parent::__construct(self::DEFAULT_HEALTH, self::DEFAULT_SHIELDS, self::DEFAULT_DAMAGE, self::DEFAULT_FUEL, $name, $starSystem);
    }

    public function attack(ShipInterface $ship){
        $this->fireProjectile()->causeDamage($ship);
    }

    public function respondAttack(ProjectileInterface $projectile){
        $projectile->causeDamage($this);
    }

    public function fireProjectile() : ProjectileInterface{
        $this->setFiredProjectiles($this->getFiredProjectiles() + 1);
        return new ShieldReaver($this->getDamage());
    }

    public function __toString()
    {
        $output = parent::__toString();
        if(!$this->isAlive()){
            return $output;
        }
        $output .= "-Projectiles fired: " . $this->getFiredProjectiles() . PHP_EOL;

        return $output;
    }
}