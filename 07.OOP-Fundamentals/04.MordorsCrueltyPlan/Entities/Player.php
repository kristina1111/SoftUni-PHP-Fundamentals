<?php

namespace Entities;

class Player
{
    private $mood;

    /**
     * Player constructor.
     * @param $mood
     */
    public function __construct(Mood $mood)
    {
        $this->setMood($mood);
    }


    /**
     * @return mixed
     */
    public function getMood()
    {
        return $this->mood;
    }

    /**
     * @param mixed $mood
     */
    private function setMood($mood)
    {
        $this->mood = $mood;
    }


    public function __toString()
    {
        $output = "";
        $output .= $this->getMood()->getPoints() . PHP_EOL;
        $output .= $this->getMood()->getKind();

        return $output;
    }
}