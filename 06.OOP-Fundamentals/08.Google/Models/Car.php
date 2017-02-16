<?php

class Car
{
    private $model;
    private $speed;

    public function __construct(string $model = "", string $speed = "")
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    private function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    private function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function changeCar(string $model, string $speed){
        $this->setModel($model);
        $this->setSpeed($speed);
    }

}