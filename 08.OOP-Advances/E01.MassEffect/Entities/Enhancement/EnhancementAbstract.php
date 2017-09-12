<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.9.2017 г.
 * Time: 17:46 ч.
 */

namespace Entities\Enhancement;


class EnhancementAbstract implements EnhancementInterface
{

    public function getName(): string
    {
        return basename(get_class($this));
    }
}