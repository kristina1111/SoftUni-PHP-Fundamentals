<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 16:11 ч.
 */

namespace Core\Commands;


class StatusReportCommand extends CommandAbstract
{

    public function execute(array $args = []): string
    {
        array_shift($args);
        $shipName = array_shift($args);
        if(!$this->getGalaxy()->shipExists($shipName)){
            throw new \Exception("$shipName does not exists!");
        }

        $ship = $this->getGalaxy()->getShip($shipName);
        return $ship->__toString();
    }
}