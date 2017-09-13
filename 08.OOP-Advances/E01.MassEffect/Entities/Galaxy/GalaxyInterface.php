<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 12:18 ч.
 */

namespace Entities\Galaxy;


use Entities\Ship\ShipInterface;
use Entities\StarSystem\StarSystemInterface;

interface GalaxyInterface
{
    public function getStarSystem(string $name) : StarSystemInterface;

    public function addStarSystem(StarSystemInterface $starSystem);

    public function addShip(ShipInterface $ship);

    public function shipExists(string $shipName) : bool;

    public function getShip(string $name): ShipInterface;
}