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
    public function addNeighbour(string $starSystemName, int $fuelNeeded) : StarSystemInterface;

    public function addShip(ShipInterface $ship) : StarSystemInterface;

    public function getShip(string $name) : ShipInterface;

    public function getName() : string;

    public function getNeighbours(): array;

    public function getShips():array;

    public function hasNeighbour(string $starSystemName): bool ;

    public function hasShip(string $shipName):bool;

    public function travelTo(ShipInterface $ship, StarSystemInterface $starSystem);
}