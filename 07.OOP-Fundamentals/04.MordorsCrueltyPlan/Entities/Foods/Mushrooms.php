<?php
namespace Entities\Foods;
use Entities\Mood;

class Mushrooms implements FoodInterface
{
    const POINTS_GIVEN = -10;

    public function givePoints(Mood $mood)
    {
        $mood->changePoints(self::POINTS_GIVEN);
        $mood->changeKind();
    }
}