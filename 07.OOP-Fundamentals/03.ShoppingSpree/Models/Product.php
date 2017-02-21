<?php

class Product
{
    private $name;
    private $price;

    public function __construct(string $name = "", float $price=0.0)
    {
        $this->setName($name);
        $this->setPrice($price);
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
     * @throws Exception If name is empty string
     */
    private function setName(string $name)
    {
        if(strlen($name)>0){
            $this->name = $name;
        }else{
            throw new Exception("Name cannot be empty");
        }

    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @throws Exception If price is negative
     */
    private function setPrice(float $price)
    {
        if($price>=0){
            $this->price = $price;
        }else{
            throw new Exception("Price cannot be negative");
        }
    }


}