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
    private $ships = [];

    /**
     * @var StarSystemInterface[]
     */
    private $neighbours = [];

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function getNeighbours(): array
    {
        return $this->neighbours;
    }

    public function getShips(): array
    {
        return $this->ships;
    }

    public function addNeighbour(string $starSystemName, int $fuelNeeded): StarSystemInterface
    {
        if (!array_key_exists($starSystemName, $this->getNeighbours())) {
            $this->neighbours[$starSystemName] = $fuelNeeded;
        }
        return $this;
    }

    public function addShip(ShipInterface $ship): StarSystemInterface
    {
        if (!array_key_exists($ship->getName(), $this->getShips())) {
            $this->ships[$ship->getName()] = $ship;
        }
        return $this;
    }

    public function getShip(string $name): ShipInterface
    {
        if (array_key_exists($name, $this->getShips())) {
            return $this->ships[$name];
        }
    }

    public function hasNeighbour(string $starSystemName): bool
    {
        return array_key_exists($starSystemName, $this->getNeighbours());
    }

    public function hasShip(string $shipName): bool
    {
        return array_key_exists($shipName, $this->getShips());
    }

    public function travelTo(ShipInterface $ship, StarSystemInterface $starSystem)
    {
        if ($this->hasNeighbour($starSystem->getName())) {
            if ($this->hasShip($ship->getName())) {
                $fuelNeeded = $this->neighbours[$starSystem->getName()];
                if ($ship->getFuel() >= $fuelNeeded) {
                    unset($this->ships[$ship->getName()]);
                    $ship->setFuel($ship->getFuel() - $fuelNeeded);
                    $starSystem->addShip($ship);
                    $ship->jumpToStarSystem($starSystem);
                }
            }

        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}