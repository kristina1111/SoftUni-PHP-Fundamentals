<?php
namespace Entities\Foods;
use Entities\Mood;

class HoneyCake implements FoodInterface
{
    const POINTS_GIVEN = 5;

    public function givePoints(Mood $mood)
    {
        $mood->changePoints(self::POINTS_GIVEN);
        $mood->changeKind();
    }
}