<?php


class Pokemon
{
    private $name;
    private $element;
    private $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
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
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @param string $element
     */
    private function setElement(string $element)
    {
        $this->element = $element;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    private function setHealth(int $health)
    {
        $this->health = $health;
    }

    public function hasElement(string $element) : bool{
        return $this->getElement()== $element;
    }

    public function decreaseHealth() {
        $this->health -=10;
    }

    public function isAlive() : bool {
        return $this->getHealth() > 0;
    }

}