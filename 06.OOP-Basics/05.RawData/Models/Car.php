<?php

class Car
{
    private $model;
    private $engine;
    private $cargo;
    private $tyres;

    public function __construct(string $model, Engine $engine, Cargo $cargo, array $tyres=[])
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tyres = $tyres;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @param Cargo $cargo
     */
    public function setCargo(Cargo $cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return array
     */
    public function getTyres(): array
    {
        return $this->tyres;
    }

    /**
     * @param array $tyres
     */
    public function setTyres(array $tyres)
    {
        $this->tyres = $tyres;
    }

    public function hasTyrePressureUnder1() : bool
    {
        foreach ($this->getTyres() as $tyre) {
            if($tyre->isPressureUnder1()){
                return true;
            }
        }
        return false;
    }


}