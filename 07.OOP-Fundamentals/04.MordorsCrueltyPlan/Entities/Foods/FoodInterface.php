<?php

namespace Entities\Foods;
//
use Entities\Mood;

interface FoodInterface
{
    public function givePoints(Mood $mood);
}