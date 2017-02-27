<?php

interface IOInterface
{
    /*
     * @param $text mixed
     * @return void
     */
    public static function write(string $text);

    /*
     * @param $text mixed
     * @return void
     */
    public static function writeLine(string $text);

    /*
     * @return string
     */
    public static function readLine(): string;
}

class ConsoleIO implements IOInterface
{

    public static function write(string $text)
    {
        echo $text;
    }

    /**
     * @param string $text
     */
    public static function writeLine(string $text)
    {
        echo $text . PHP_EOL;
    }

    /**
     * @return string
     */
    public static function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}

interface AnimalInterface
{
    function produceSound(): string;

    function getClass(): string;

    function __toString();
}

class Animal implements AnimalInterface
{
    protected $name;
    protected $age;
    protected $gender;

    /**
     * Animal constructor.
     * @param array $info
     */
    public function __construct(array $info)
    {
        $this->setName($info[0]);
        $this->setAge($info[1]);
        $this->setGender($info[2]);
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
     * @throws \Exception
     */
    protected function setName($name)
    {
        if (strlen($name) === 0) {
            throw new \Exception("Invalid input!");
        }
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @throws \Exception
     */
    protected function setAge($age)
    {
        if (!is_numeric($age) || $age < 0) {
            throw new \Exception("Invalid input!");
        }
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @throws \Exception
     */
    protected function setGender($gender)
    {
        if (strtolower($gender) != "male" && strtolower($gender) != "female") {
            throw new \Exception("Invalid input!");
        }
        $this->gender = $gender;
    }


    public function produceSound(): string
    {
        return "Not implemented!";
    }

    function getClass(): string
    {
        $arr = explode('\\', get_class($this));
        return $arr[count($arr) - 1];
    }

    public function __toString()
    {
        $output = $this->getClass()
            . " "
            . $this->getName()
            . " "
            . $this->getAge()
            . " "
            . $this->getGender()
            . PHP_EOL;
        $output .= $this->produceSound() . PHP_EOL;

        return $output;
    }


}

class Cat extends Animal
{
    public function produceSound(): string
    {
        return "MiauMiau";
    }
}

class Dog extends Animal
{
    /**
     * @return string
     */
    public function produceSound(): string
    {
        return "BauBau";
    }


}

class Frog extends Animal
{
    /**
     * @return string
     */
    public function produceSound(): string
    {
        return "Frogggg";
    }
}

class Kitten extends Cat
{
    public function produceSound(): string
    {
        return "Miau";
    }

    protected function setGender($gender)
    {
        if (strtolower($this->gender) != "female") {
            throw new \Exception("Invalid input!");
        }
        parent::setGender($gender);
    }
}

class Tomcat extends Cat
{
    public function produceSound(): string
    {
        return "Give me one million b***h";
    }

    protected function setGender($gender)
    {
        if (strtolower($this->gender) != "male") {
            throw new \Exception("Invalid input!");
        }
        parent::setGender($gender);
    }
}

const ANIMALS = array('dog', 'cat', 'frog', 'kitten', 'tomcat');
$animals = [];
$type = ConsoleIO::readLine();
try {
    while (strtolower($type) != "beast!") {
        $info = array_filter(explode(' ', ConsoleIO::readLine()), function ($value) {
            return $value != "";
        });
        $animal = null;

        if (count($info) === 3) {
            if (in_array(strtolower($type), ANIMALS)) {
                $cmd = ucfirst(strtolower($type));
                $animal = new $cmd($info);
                $animals[] = $animal;
            } else {
                throw new Exception("Invalid input!");
//                echo "Invalid input!" . PHP_EOL;
            }

//            else{
//                $animal = new Animal($info);
//            }

        } else {
            throw new Exception("Invalid input!");
//            echo "Invalid input!" . PHP_EOL;
        }

//        ConsoleIO::write($animal);


        $type = ConsoleIO::readLine();
    }

    if (count($animals) > 0) {
        /** @var Animal $a */
        foreach ($animals as $a) {
            ConsoleIO::write($a);
        }
    }

} catch (Exception $e) {
    ConsoleIO::writeLine($e->getMessage());
}
