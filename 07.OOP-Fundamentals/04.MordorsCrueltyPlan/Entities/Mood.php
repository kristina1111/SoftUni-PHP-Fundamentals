<?php
namespace Entities;
class Mood
{
    private $kind;
    private $points;

    /**
     * Mood constructor.
     * @param string $kind
     * @param int $points
     */
    public function __construct(string $kind = "Happy", int $points = 0)
    {
        $this->setKind($kind);
        $this->points = $points;
    }


    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    private function setKind(string $kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    private function setPoints($points)
    {
        $this->points = $points;
    }

    public function changePoints(int $points)
    {
        $this->setPoints($this->getPoints() + $points);
    }

    public function changeKind()
    {
        $kind = $this->getKind();
        if($this->getPoints()<-5){
            $kind = "Angry";
        }
        elseif($this->getPoints()<0 && $this->getPoints()>=-5){
            $kind = "Sad";
        }
        elseif($this->getPoints()>=0 && $this->getPoints()<=15){
            $kind = "Happy";
        }elseif ($this->getPoints()>15){
            $kind = "PHP";
        }

        $this->setKind($kind);
    }


}