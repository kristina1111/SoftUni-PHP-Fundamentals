<?php
namespace MankindApp\Entities;

abstract class HumanAbstract
{
    protected $firstName;
    protected $lastName;

    /**
     * HumanAbstract constructor.
     * @param array $info
     */
    public function __construct(array $info)
    {
        $this->setFirstName($info[0]);
        $this->setLastName($info[1]);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        if($firstName[0] !== ucfirst($firstName[0])){
            throw new \InvalidArgumentException("Expected upper case letter!Argument: firstName");
        }
        if(strlen($firstName)<4){
            throw new \InvalidArgumentException("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    protected function setLastName(string $lastName)
    {
        if($lastName[0] !== ucfirst($lastName[0])){
            throw new \InvalidArgumentException("Expected upper case letter!Argument: lastName");
        }
        if(strlen($lastName)<3){
            throw new \InvalidArgumentException("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        $output = "First Name: " . $this->getFirstName() . PHP_EOL;
        $output .= "Last Name: " . $this->getLastName() . PHP_EOL;

        return $output;


    }


}