<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:46 ч.
 */

namespace Entities\Enhancement;


use Entities\Ship\ShipInterface;

abstract class EnhancementAbstract implements EnhancementInterface
{

    public function getName(): string
    {
        return basename(get_class($this));
    }

    public function __toString()
    {
        return basename(get_class($this));
    }
}