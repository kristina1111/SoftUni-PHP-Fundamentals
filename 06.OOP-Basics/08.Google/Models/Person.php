<?php

require_once "Occupation.php";

class Person
{
    private $name;
    private $occupation;
    private $car;
    private $children;
    private $parents;
    private $pokemons;

    public function __construct(string $name, Occupation $occupation, Car $car, array $pokemons = [], array $children = [], array $parents = [])
    {
        $this->name = $name;
        $this->occupation = $occupation;
        $this->car = $car;
        $this->pokemons = $pokemons;
        $this->parents = $parents;
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param mixed $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
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
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }

    /**
     * @param Car $car
     */
    private function setCar(Car $car)
    {
        $this->car = $car;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * @param array $children
     */
    private function setChildren(array $children)
    {
        $this->children = $children;
    }

    /**
     * @return array
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    /**
     * @param array $parents
     */
    private function setParents(array $parents)
    {
        $this->parents = $parents;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param array $pokemons
     */
    private function setPokemons(array $pokemons)
    {
        $this->pokemons = $pokemons;
    }


//    public function addPokemon(string $name, string $type){
//        $this->pokemons[$name] = new Pokemon($name, $type);
//    }


//make abstract !!!!!!
    public function changeInfo(string $whatToChange, string $name, string $info){
        switch ($whatToChange){
            case "pokemon":
                $this->getArray($whatToChange)[$name]->changePokemonType($info);
                break;
            case "children":
                $this->getArray($whatToChange)[$name]->changeChildBirthday(DateTime::createFromFormat('d/m/Y',$info));
                break;
            case "parents":
                var_dump($info);
                $this->getArray($whatToChange)[$name]->changeParentBirthday(DateTime::createFromFormat('d/m/Y', $info));
                break;
        }
    }

    public function getArray(string $whatToGet){
        switch ($whatToGet){
            case "pokemon":
                return $this->getPokemons();
                break;
            case "children":
                return $this->getChildren();
                break;
            case "parents":
                return $this->getParents();
                break;
            default:
                throw new Exception("Not such array to get!");
        }
    }

    public function addToArray(string $whatToAdd, string $name, string $info){
        switch ($whatToAdd){
            case "pokemon":
                $this->pokemons[$name] = new Pokemon($name, $info);
                break;
            case "children":
                $this->children[$name] = new ChildOfUser($name, DateTime::createFromFormat('d/m/Y', $info));
                break;
            case "parents":
                $this->parents[$name] = new ParentOfUser($name, DateTime::createFromFormat('d/m/Y',$info));
                break;
        }
    }

    public function __toString()
    {
        $output = "" . $this->getName() . PHP_EOL;
        $output .= "Company:" . PHP_EOL;

        if($this->getOccupation()->getEmployer() !=""){
            $output .= $this->getOccupation()->getEmployer() . " "
                . $this->getOccupation()->getDepartment() . " " . number_format($this->getOccupation()->getSalary(), 2) . PHP_EOL;
        }
        $output .= "Car:" . PHP_EOL;

        if($this->getCar()->getModel()!=""){
            $output.= $this->getCar()->getModel() . " " . $this->getCar()->getSpeed() . PHP_EOL;
        }
        $output .= "Pokemon:" . PHP_EOL;

        if(count($this->getPokemons())>0){
            foreach ($this->getPokemons() as $pokemon){
                $output .= $pokemon->getName() . " " . $pokemon->getType() . PHP_EOL;
            }
        }

        $output .= "Parents:" . PHP_EOL;

        if(count($this->getParents())>0){
            foreach ($this->getParents() as $parent){
                $output .= $parent->getName() . " " . $parent->getBirthday()->format('d/m/Y') . PHP_EOL;
            }
        }

        $output .= "Children:" . PHP_EOL;
        if(count($this->getChildren())>0){
            foreach ($this->getChildren() as $child){
                $output .= $child->getName() . " " . $child->getBirthday()->format('d/m/Y') . PHP_EOL;
            }
        }
        return $output;
    }

}