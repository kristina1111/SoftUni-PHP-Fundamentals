<?php
namespace StudentsApp\Entities;
use StudentsApp\Entities\Validator;

class Student
{

    private $firstName;
    private $secondName;
    private $email;
    private $examScore;

    /**
     * Student constructor.
     * @param string $firstName
     * @param string $secondName
     * @param string $email
     * @param string $examScore
     */
    public function __construct(string $firstName, string $secondName, string $email, string $examScore)
    {
        $this->setFirstName($firstName);
        $this->setSecondName($secondName);
        $this->setEmail($email);
        $this->setExamScore($examScore);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @throws \Exception
     */
    private function setFirstName($firstName)
    {
        $this->firstName = Validator::validateName($firstName);
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param mixed $secondName
     */
    private function setSecondName($secondName)
    {
        $this->secondName = Validator::validateName($secondName);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    private function setEmail($email)
    {
        $this->email = Validator::validateEmail($email);
    }

    /**
     * @return mixed
     */
    public function getExamScore()
    {
        return $this->examScore;
    }

    /**
     * @param mixed $examScore
     */
    public function setExamScore($examScore)
    {
        $this->examScore = Validator::validateScore($examScore);
    }

}