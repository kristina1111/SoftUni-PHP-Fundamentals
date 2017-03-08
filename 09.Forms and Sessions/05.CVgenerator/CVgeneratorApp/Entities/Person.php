<?php

namespace CVgeneratorApp\Entities;

class Person
{
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $gender;
    private $birthDate;
    private $nationality;
    private $lastWorkPosition;
    private $programmingLangs;
    private $languages;
    private $driversLicense;

    /**
     * Person constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $phone
     * @param string $gender
     * @param string $birthDate
     * @param string $nationality
     * @internal param $languages
     * @internal param $driversLicense
     */
    public function __construct(string $firstName, string $lastName, string $email, string $phone, string $gender, string $birthDate, string $nationality)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setGender($gender);
        $this->setBirthDate($birthDate);
        $this->setNationality($nationality);
        $this->lastWorkPosition = array();
        $this->programmingLangs = array();
        $this->languages = array();
        $this->driversLicense = array();
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
    private function setFirstName(string $firstName)
    {
        $this->firstName = Validator::validateName($firstName);
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
    private function setLastName(string $lastName)
    {
        $this->lastName = Validator::validateName($lastName);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    private function setEmail(string $email)
    {
        $this->email = Validator::validateEmail($email);
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = Validator::validatePhone($phone);
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    private function setGender(string $gender)
    {
        $this->gender = Validator::validateGender($gender);
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate() : \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    function setBirthDate(string $birthDate)
    {
        $this->birthDate = Validator::validateDate($birthDate);
    }

    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    private function setNationality(string $nationality)
    {
        $this->nationality = Validator::validateNationality($nationality);
    }

    /**
     * @return array
     */
    public function getLastWorkPosition(): array
    {
        return $this->lastWorkPosition;
    }

    /**
     * @param string $name
     * @param string $startDate
     * @param string $endDate
     * @internal param array $lastWorkPosition
     */
    public function addLastWorkPosition(string $name, string $startDate, string $endDate)
    {
        if(Validator::validateLastJobPosition($name, $startDate, $endDate)){
            $this->lastWorkPosition = array('employer' => $name, 'startDate' => $startDate, 'endDate' => $endDate);
        }

    }

    /**
     * @return array
     */
    public function getProgrammingLangs(): array
    {
        return $this->programmingLangs;
    }

    /**
     * @param array $names
     * @param array $fluency
     * @throws \Exception
     * @internal param string $name
     * @internal param string $fluency
     * @internal param array $programmingLangs
     */
    public function addProgrammingLangs(array $names, array $fluency)
    {
        if(count($names) != count($fluency)){
            throw new \Exception('You need to enter valid pair "language - fluency"!');
        }
        for($i=0; $i<count($names); $i++){
            if(Validator::validateProgrammingLang($names[$i], $fluency[$i])){
                if(!array_key_exists($names[$i], $this->getProgrammingLangs())){
                    $this->programmingLangs[$names[$i]] = $fluency[$i];
                }else{
                    throw new \Exception("You already recorded " . $names[$i] . "!");
                }
            }
        }

    }

    /**
     * @return array
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @param array|string $names
     * @param array|string $comprehension
     * @param array|string $reading
     * @param array|string $writing
     * @throws \Exception
     * @internal param array $languages
     */
    public function addLanguages(array $names, array $comprehension, array $reading, array $writing)
    {
        if(count($names) != count($comprehension) || count($names)!=count($reading) || count($names)!= count($writing)){
            throw new \Exception('You need to enter valid pair "language - comprehension - reading - writing"!');
        }
        for($i=0; $i<count($names); $i++){
            if(Validator::validateLanguage($names[$i], $comprehension[$i], $reading[$i], $writing[$i])){
                if(!array_key_exists($names[$i], $this->getLanguages())){
                    $this->languages[$names[$i]] = array('comprehension' => $comprehension[$i],
                        'reading' => $reading[$i], 'writing' => $writing[$i]);
                }else{
                    throw new \Exception("You already recorded " . $names[$i] . "!");
                }
            }
        }

    }

    /**
     * @return array
     */
    public function getDriversLicense(): array
    {
        return $this->driversLicense;
    }

    /**
     * @param array $categories
     * @throws \Exception
     * @internal param string $category
     * @internal param array $driversLicense
     */
    public function addDriversLicense(array $categories)
    {
        foreach ($categories as $category){
            if(Validator::validateDriversLicense($category)){
                if(!in_array($category, $this->getDriversLicense())){
                    $this->driversLicense[] = $category;
                }else{
                    throw new \Exception("You already recorded category " . $category . "!");
                }
            }
        }

    }
}