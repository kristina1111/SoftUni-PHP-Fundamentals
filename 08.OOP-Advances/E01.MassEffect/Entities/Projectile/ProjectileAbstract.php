<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:29 ч.
 */

namespace Entities\Projectile;


abstract class ProjectileAbstract implements ProjectileInterface
{
    /**
     * @var int
     */
    protected $damage;

    public function __construct(int $damage)
    {
        $this->setDamage($damage);
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }
}