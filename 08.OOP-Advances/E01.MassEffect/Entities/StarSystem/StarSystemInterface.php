<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:08 ч.
 */

namespace Entities\StarSystem;


use Entities\Ship\ShipInterface;

interface StarSystemInterface
{
    public function addNeighbour(StarSystemInterface $starSystem, int $fuelNeeded) : StarSystemInterface;

    public function addShip(ShipInterface $ship) : StarSystemInterface;

    public function getShip(string $name) : ShipInterface;

    public function getName() : string;
}