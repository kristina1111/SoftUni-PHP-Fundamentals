<?php
namespace Entities\Foods;
use Entities\Mood;

class Lembas implements FoodInterface
{
    const POINTS_GIVEN = 3;

    public function givePoints(Mood $mood)
    {
        $mood->changePoints(self::POINTS_GIVEN);
        $mood->changeKind();
    }

}