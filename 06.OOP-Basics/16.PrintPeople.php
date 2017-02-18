<?php

$input = trim(fgets(STDIN));
$people = [];
while (strtolower($input)!="end"){
    $input = array_map('trim', explode(' ', $input));

    $person = new Person($input[0], $input[1], $input[2]);
    $people[] = $person;
    $input = trim(fgets(STDIN));
}

usort($people, 'sortArray');

foreach ($people as $person){
    echo $person . PHP_EOL;
}

function sortArray(Person $person1, Person $person2){
    return $person1->getAge()>$person2->getAge();
}

class Person
{
    private $name;
    private $age;
    private $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setOccupation($occupation);
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
     */
    private function setName($name)
    {
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
     */
    private function setAge($age)
    {
        $this->age = $age;
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
    private function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    public function __toString() : string
    {
        $output = "";
        $output .= $this->getName() . " - age: " . $this->getAge() . ", occupation: " . $this->getOccupation();
        return $output;
    }

}