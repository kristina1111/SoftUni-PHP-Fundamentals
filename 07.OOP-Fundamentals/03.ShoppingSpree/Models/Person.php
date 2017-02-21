<?php

class Person
{
    private $name;
    private $money;
    private $products;

    /**
     * Person constructor.
     * @param $name
     * @param $money
     * @param $products
     */
    public function __construct(string $name = "", float $money, array $products = [])
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = $products;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @throws Exception If name is empty string
     */
    private function setName($name)
    {
        if(strlen($name)>0){
            $this->name = $name;
        }else{
            throw new Exception("Name cannot be empty");
        }
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     * @throws Exception If money is negative
     */
    private function setMoney($money)
    {
        if($money>=0){
            $this->money = $money;
        }else{
            throw new Exception("Money cannot be negative");
        }
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function decreaseMoney(float $money)
    {
        $this->setMoney($this->getMoney() - $money);
    }

    public function __toString()
    {
        $output = "";
        $output .= $this->getName() . " - ";
        if(count($this->getProducts())>0){
            foreach ($this->getProducts() as $product){
                $output .= $product->getName() . ', ';
            }
            $output = trim($output, ', ');
            return $output;
        }
        $output .= "Nothing bought";
        return $output;
    }

}