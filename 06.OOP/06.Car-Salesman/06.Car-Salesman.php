<?php
/*
 * Define two classes Car and Engine. A Car has a model, engine, weight and color. An Engine has model, power,
displacement and efficiency. A Car’s weight and color and its Engine’s displacements and efficiency are optional.
On the first line you will read a number N which will specify how many lines of engines you will receive, on each of
the next N lines you will receive information about an Engine in the following format “<Model> <Power>
<Displacement> <Efficiency>”. After the lines with engines, on the next line you will receive a number M –
specifying the number of Cars that will follow, on each of the next M lines information about a Car will follow in the
following format “<Model> <Engine> <Weight> <Color>”, where the engine in the format will be the model of an
existing Engine. When creating the object for a Car, you should keep a reference to the real engine in it, instead of
just the engine’s model, note that the optional properties might be missing from the formats.
Your task is to print each car (in the order you received them) and its information in the format defined bellow, if
any of the optional fields has not been given print “n/a” in its place instead:
<CarModel>:
<EngineModel>:
Power: <EnginePower>
Displacement: <EngineDisplacement>
Efficiency: <EngineEfficiency>
Weight: <CarWeight>
Color: <CarColor>

Sample input 1:
2
V8-101 220 50
V4-33 140 28 B
3
FordFocus V4-33 1300 Silver
FordMustang V8-101
VolkswagenGolf V4-33 Orange

Sample input 2:
4
DSL-10 280 B
V7-55 200 35
DSL-13 305 55 A+
V7-54 190 30 D
4
FordMondeo DSL-13 Purple
VolkswagenPolo V7-54 1200 Yellow
VolkswagenPassat DSL-10 1375 Blue
FordFusion DSL-13
 */
//require_once 'Models\Car.php';
//require_once 'Models\Engine.php';

$numInputs = trim(fgets(STDIN));
$arrEngines = [];
while($numInputs--){
    $inputEngine = array_map('trim', explode(' ', trim(fgets(STDIN))));
    $newEngine = new Engine($inputEngine[0], $inputEngine[1]);
    if(isset($inputEngine[2]) && is_numeric($inputEngine[2])){
        $newEngine->setDisplacement($inputEngine[2]);

        if(isset($inputEngine[3])){
            $newEngine->setEfficiency($inputEngine[3]);
        }
    }else{
        if(isset($inputEngine[2])){
            $newEngine->setEfficiency($inputEngine[2]);
        }

        if(isset($inputEngine[3])){
            $newEngine->setDisplacement($inputEngine[3]);
        }

    }

//    print_r($newEngine);
    $arrEngines[$newEngine->getModel()][] = $newEngine;
}

$numInputs = trim(fgets(STDIN));
$arrCars = [];
while ($numInputs--){
    $inputCar = array_map('trim', explode(' ', trim(fgets(STDIN))));
    if(array_key_exists($inputCar[1], $arrEngines)){
        $newCar = new Car($inputCar[0], $arrEngines[$inputCar[1]][0]);

        if(isset($inputCar[2]) && is_numeric($inputCar[2])){
            $newCar->setWeight($inputCar[2]);
            if(isset($inputCar[3])){
                $newCar->setColor($inputCar[3]);
            }
        }else{
            if (isset($inputCar[2])){
                $newCar->setColor($inputCar[2]);
            }

            if(isset($inputCar[3])){
                $newCar->setWeight($inputCar[3]);
            }

        }

        $arrCars[$newCar->getModel()][] = $newCar;
        echo $newCar . PHP_EOL;
    }
}

class Engine
{
    private static $lastId;

    private $id;
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct($model, $power, $displacement = "n/a", $efficiency = "n/a")
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
        $this->id = ++self::$lastId;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }

    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->power = $power;
    }

    /**
     * @param string $displacement
     */
    public function setDisplacement(string $displacement)
    {
        $this->displacement = $displacement;
    }

    /**
     * @param string $efficiency
     */
    public function setEfficiency(string $efficiency)
    {
        $this->efficiency = $efficiency;
    }

    public function __toString()
    {
        return "  " . $this->getModel() . ":"
            . PHP_EOL
            . "    Power: " . $this->getPower()
            . PHP_EOL
            . "    Displacement: " . $this->getDisplacement()
            . PHP_EOL
            . "    Efficiency: " . $this->getEfficiency();
    }
}

class Car
{
    private static $lastId;

    private $id;
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, $weight = "n/a", $color = "n/a")
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
        $this->id = ++self::$lastId;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    /**
     * @param Engine $engine
     */
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function __toString()
    {
        return $this->getModel() . ":"
            . PHP_EOL
            . $this->getEngine()
            . PHP_EOL
            . "  Weight: " . $this->getWeight()
            . PHP_EOL
            . "  Color: " . $this->getColor();
    }
}
?>