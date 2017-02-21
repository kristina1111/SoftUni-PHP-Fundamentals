<?php
namespace Entities\Foods;
use Entities\Mood;

class Cram implements FoodInterface
{
    const POINTS_GIVEN = 2;

    public function givePoints(Mood $mood)
    {
        $mood->changePoints(self::POINTS_GIVEN);
        $mood->changeKind();
    }
}