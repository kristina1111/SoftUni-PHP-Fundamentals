<?php

class ChildOfUser
{
    private $name;
    private $birthday;

    public function __construct(string $name ="", DateTime $birthday = null)
    {
        $this->name = $name;
        $this->setBirthday($birthday);
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


    public function getBirthday()
    {
        return $this->birthday;
    }


    private function setBirthday(DateTime $birthday)
    {
        if($birthday==null){
            $this->birthday = DateTime::createFromFormat('d/m/Y', '01/01/2000');
        }else{
            $this->birthday = $birthday;
        }
    }

    public function changeChildBirthday(DateTime $birthday){
        $this->setBirthday($birthday);
    }

}