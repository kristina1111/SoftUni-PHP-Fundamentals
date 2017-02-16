<?php

class Pokemon
{
    private $name;
    private $type;

    public function __construct(string $name = "", string $type = "")
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type)
    {
        $this->type = $type;
    }

    public function changePokemonType(string $type){
        $this->setType($type);
    }



}