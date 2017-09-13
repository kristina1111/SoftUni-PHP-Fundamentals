<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 15:38 ч.
 */

namespace Core\Commands;


class AttackCommand extends CommandAbstract
{

    public function execute(array $args = []): string
    {
        array_shift($args);
        $attackerName = array_shift($args);
        $targetName = array_shift($args);

        $attacker = $this->getGalaxy()->getShip($attackerName);
        $target = $this->getGalaxy()->getShip($targetName);

        if(!$attacker->isAlive() || !$target->isAlive()){
            throw new \Exception("Ship is destroyed");
        }

        if($attacker->getStarSystem()->getName() !== $target->getStarSystem()->getName()){
            throw new \Exception("No such ship in star system");
        }

        $attacker->attack($target);

        $output = "$attackerName attacked $targetName";

        if (!$target->isAlive()) {
            $output .= PHP_EOL . "$targetName has been destroyed";
        }

        return $output;

    }
}