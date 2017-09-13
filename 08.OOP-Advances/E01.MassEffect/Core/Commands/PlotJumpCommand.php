<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 16:33 ч.
 */

namespace Core\Commands;


class PlotJumpCommand extends CommandAbstract
{

    public function execute(array $args = []): string
    {
        array_shift($args);
        $shipName = array_shift($args);
        $starSystemName = array_shift($args);

        if(!$this->getGalaxy()->shipExists($shipName)){
            throw new \Exception("$shipName does not exists!");
        }
        $starSystem = $this->getGalaxy()->getStarSystem($starSystemName);
        $ship = $this->getGalaxy()->getShip($shipName);
        $oldStarSystem = $ship->getStarSystem();
        $oldStarSystem->travelTo($ship, $starSystem);
        return "$shipName jumped from {$oldStarSystem->getName()} to $starSystemName";
    }
}