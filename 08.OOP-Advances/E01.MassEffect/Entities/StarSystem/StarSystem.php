<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:10 ч.
 */

namespace Entities\StarSystem;


use Entities\Ship\ShipInterface;

class StarSystem implements StarSystemInterface
{
    private $name;

    /**
     * @var ShipInterface[]
     */
    private $ships;

    /**
     * @var StarSystemInterface[]
     */
    private $neighbours;

    public function __construct(string $name, array $ships = [], array $neighbours = [])
    {
        $this->setName($name);
    }

    public function addNeighbour(StarSystemInterface $starSystem, int $fuelNeeded): StarSystemInterface
    {
        // TODO: Implement addNeighbour() method.
    }

    public function addShip(ShipInterface $ship): StarSystemInterface
    {
        // TODO: Implement addShip() method.
    }

    public function getShip(string $name): ShipInterface
    {
        // TODO: Implement getShip() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function setName(string $name){
        $this->name = $name;
    }
}