<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:16 ч.
 */

namespace Entities\Ship;


use Entities\Enhancement\EnhancementInterface;
use Entities\StarSystem\StarSystemInterface;

interface ShipInterface
{
    public function getName(): string;
    public function setName(string $name);
    public function getHealth() : int;
    public function setHealth(int $health);
    public function getShields() : int;
    public function setShields(int $shields);
    public function getDamage(): int;
    public function setDamage(int $damage);
    public function getFuel() : float;
    public function setFuel(float $fuel);
    public function getStarSystem(): StarSystemInterface;
    public function jumpToStarSystem(StarSystemInterface $starSystem);
    public function isAlive():bool;
    public function addEnhancement(EnhancementInterface $enhancement);
}