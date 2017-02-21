<?php

/*
 * Create a program in which each command corresponds to a person buying a product.
 * If the person can afford a product add it to his bag. If a person doesn’t have enough money,
 * print an appropriate message ("[Person name] can't afford [Product name]").
 * On the first two lines you are given all people and all products.
 * Next you will be given all purchases people made until END is reached.
 * Print a message when someone makes a purchase. After all purchases print every person in the order of appearance
 * and all products that he has bought also in order of appearance. If nothing is bought,
 * print the name of the person followed by "Nothing bought".
 * In case of invalid input (negative money exception message: "Money cannot be negative")
 * or empty name: (empty name exception message "Name cannot be empty") break the program
 * with an appropriate message. See the examples below:
 *
 * Sample input 1:
Pesho=11;Gosho=4;
Bread=10;Milk=2;
Pesho Bread
Gosho Milk
Gosho Milk
Pesho Milk
 *
 * Expected output:
Pesho bought Bread
Gosho bought Milk
Gosho bought Milk
Pesho can't afford Milk
Pesho - Bread
Gosho - Milk, Milk
 *
 * Sample input 2:
Mimi=0;
Kafence=2;
Mimi Kafence
END
 *
 * Sample input 3:
Jeko=-3;
Chushki=1;
Jeko Chushki
END
 *
 */

//spl_autoload_register(function($class) {
//    $class = $class . '.php';
//    require_once "Models/" . $class;
//});
$inputPeople = array_map('trim', explode(';', fgets(STDIN)));
//$inputPeople = array_map('trim', explode(';', "Jeko=3;"));
$peopleArr = [];
$inputProducts = array_map('trim', explode(';', fgets(STDIN)));
//$inputProducts = array_map('trim', explode(';', "END"));
$productsArr = [];

try {

    foreach ($inputPeople as $info) {
        $infoForPerson = array_map('trim', explode('=', $info));
        if (count($infoForPerson) == 2) {
            $person = new Person($infoForPerson[0], floatval($infoForPerson[1]));
            $peopleArr[$infoForPerson[0]] = $person;
            continue;
        }
        if (is_numeric($infoForPerson[0])) {
            throw new Exception("Name cannot be empty");

        }
    }
    unset($inputPeople);

    if ($inputProducts[0] != "END") {
        foreach ($inputProducts as $info) {
            $infoForProduct = array_map('trim', explode('=', $info));
            if (count($infoForProduct) == 2) {
                $product = new Product($infoForProduct[0], floatval($infoForProduct[1]));
                $productsArr[$infoForProduct[0]] = $product;
                continue;
            }
            if (is_numeric($infoForProduct[0])) {
                throw new Exception("Name cannot be empty");
            }
        }
        unset($inputProducts);

        $personProduct = trim(fgets(STDIN));


        while (strtolower($personProduct) != "end") {
            $personProduct = array_map('trim', explode(' ', $personProduct));
            if (count($personProduct) == 2) {
                if ($peopleArr[$personProduct[0]]->getMoney() >= $productsArr[$personProduct[1]]->getPrice()) {
                    $peopleArr[$personProduct[0]]->addProduct($productsArr[$personProduct[1]]);
                    $peopleArr[$personProduct[0]]->decreaseMoney($productsArr[$personProduct[1]]->getPrice());
                    echo "{$peopleArr[$personProduct[0]]->getName()} bought {$productsArr[$personProduct[1]]->getName()}" . PHP_EOL;
                } else {
                    echo "{$peopleArr[$personProduct[0]]->getName()} can't afford {$productsArr[$personProduct[1]]->getName()}" . PHP_EOL;
                }
            }

            $personProduct = trim(fgets(STDIN));
        }
    }

//    print_r($peopleArr);
//    print_r($productsArr);
} catch (Exception $e) {
    echo $e->getMessage();
    return;
}

foreach ($peopleArr as $person) {
    echo $person . PHP_EOL;
}


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
        if (strlen($name) > 0) {
            $this->name = $name;
        } else {
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
        if ($money >= 0) {
            $this->money = $money;
        } else {
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
        if (count($this->getProducts()) > 0) {
            foreach ($this->getProducts() as $product) {
                $output .= $product->getName() . ',';
            }
            $output = trim($output, ', ');
            return $output;
        }
        $output .= "Nothing bought";
        return $output;
    }

}

class Product
{
    private $name;
    private $price;

    public function __construct(string $name = "", float $price = 0.0)
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
        if (strlen($name) > 0) {
            $this->name = $name;
        } else {
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
        if ($price >= 0) {
            $this->price = $price;
        } else {
            throw new Exception("Price cannot be negative");
        }
    }


}

