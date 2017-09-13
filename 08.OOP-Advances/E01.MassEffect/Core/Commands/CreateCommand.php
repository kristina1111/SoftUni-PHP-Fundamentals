<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 13:43 ч.
 */

namespace Core\Commands;


use Entities\Enhancement\EnhancementInterface;
use Entities\Ship\ShipInterface;

class CreateCommand extends CommandAbstract
{
    public function execute(array $args = []): string
    {
        array_shift($args);
        $shipType = array_shift($args);
        $shipName = array_shift($args);
        $starSystemName = array_shift($args);
        $enhancements = $args;

        if($this->getGalaxy()->shipExists($shipName)){
            throw new \Exception("Ship with such name already exists");
        }

        $starSystem = $this->galaxy->getStarSystem($starSystemName);

        $shipFullName = "Entities\\Ship\\" . $shipType;
        /** @var ShipInterface $newShip */
        $newShip = new $shipFullName($shipName, $starSystem);

        foreach ($enhancements as $enhancement){
            $enhancementFullName = "Entities\\Enhancement\\" . $enhancement;

            /** @var EnhancementInterface $newEnhancement */
            $newEnhancement = new $enhancementFullName();
            $newShip->addEnhancement($newEnhancement);
        }

        $this->getGalaxy()->addShip($newShip);
        $starSystem->addShip($newShip);

        return "Created {$shipType} {$shipName}";
    }

}