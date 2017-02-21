<?php
namespace Entities\Foods;
use Entities\Mood;

class Allelse implements FoodInterface
{
    const POINTS_GIVEN = -1;

    public function givePoints(Mood $mood)
    {
        $mood->changePoints(self::POINTS_GIVEN);
        $mood->changeKind();
    }
}