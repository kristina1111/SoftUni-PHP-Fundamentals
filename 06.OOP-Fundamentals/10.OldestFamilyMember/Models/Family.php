<?php

class Family
{
    private $members = [];

    public function __construct(array $members = [])
    {
        $this->members = $members;
    }

    public function getMembers(): array
    {
        return $this->members;
    }

    public function addMemberToFamily(Person $person){
        $this->members[] = $person;
//        if(!array_key_exists($person->getName(), $this->getMembers())){
//            $this->members[$person->getName()] = $person;
//        }else{
//            throw new \Exception("Member with that name already exists!");
//        }
    }

    public function getOldestMember():Person{
        if(count($this->getMembers())>0){
            $oldestMember = current($this->getMembers());
            foreach ($this->getMembers() as $member){
                if($oldestMember->getAge()<$member->getAge()){
                    $oldestMember = $member;
                }
            }
            return $oldestMember;
        }else{
            throw new Exception("No members in the Family!");
        }
    }
}