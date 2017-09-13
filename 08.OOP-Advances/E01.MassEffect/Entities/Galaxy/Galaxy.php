<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 12:21 ч.
 */

namespace Entities\Galaxy;


use Entities\Ship\ShipInterface;
use Entities\StarSystem\StarSystemInterface;

class Galaxy implements GalaxyInterface
{
    /** @var StarSystemInterface[] */
    private $starSystems = [];
    /** @var ShipInterface[] */
    private $ships = [];



    public function getStarSystem(string $name): StarSystemInterface
    {
        if(array_key_exists($name, $this->starSystems)){
            return $this->starSystems[$name];
        }
    }

    public function addStarSystem(StarSystemInterface $starSystem)
    {
//        if(!array_key_exists($starSystem->getName(), $this->starSystems)){
            $this->starSystems[$starSystem->getName()] = $starSystem;
//        }
    }

    public function addShip(ShipInterface $ship){
        $this->ships[$ship->getName()] = $ship;
    }

    public function shipExists(string $shipName) : bool{
        return array_key_exists($shipName, $this->ships);
    }

    public function getShip(string $name): ShipInterface{
        if(!$this->shipExists($name)){
            throw new \Exception("$name ship does not exists!");
        }

        return $this->ships[$name];
    }
}