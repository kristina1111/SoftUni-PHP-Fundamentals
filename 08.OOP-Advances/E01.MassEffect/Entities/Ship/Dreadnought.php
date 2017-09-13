<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 10:55 ч.
 */

namespace Entities\Ship;


use Entities\Projectile\Laser;
use Entities\Projectile\ProjectileInterface;
use Entities\StarSystem\StarSystemInterface;

class Dreadnought extends ShipAbstract
{
    const DEFAULT_HEALTH = 200;
    const DEFAULT_SHIELDS = 300;
    const DEFAULT_DAMAGE = 150;
    const DEFAULT_FUEL = 700;

    const RESPOND_ATTACK_SHIELDS_BONUS = 50;

    public function __construct($name, StarSystemInterface $starSystem)
    {
        parent::__construct(self::DEFAULT_HEALTH, self::DEFAULT_SHIELDS, self::DEFAULT_DAMAGE, self::DEFAULT_FUEL, $name, $starSystem);
    }

    public function attack(ShipInterface $ship)
    {
        $ship->respondAttack($this->fireProjectile());
    }

    public function respondAttack(ProjectileInterface $projectile){
        $this->setShields($this->getShields() + self::RESPOND_ATTACK_SHIELDS_BONUS);
        $projectile->causeDamage($this);
        $this->setShields($this->getShields() - self::RESPOND_ATTACK_SHIELDS_BONUS);
    }

    public function fireProjectile(): ProjectileInterface
    {
        $this->setFiredProjectiles($this->getFiredProjectiles() + 1);
        return new Laser(intval($this->getShields()/2) + $this->getDamage());
    }
}