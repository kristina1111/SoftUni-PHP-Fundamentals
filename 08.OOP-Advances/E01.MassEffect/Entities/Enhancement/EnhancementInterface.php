<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:45 ч.
 */

namespace Entities\Enhancement;


use Entities\Ship\ShipInterface;

interface EnhancementInterface
{
    function giveBonus(ShipInterface $ship);
}