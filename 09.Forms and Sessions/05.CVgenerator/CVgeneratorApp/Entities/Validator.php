<?php
namespace CVgeneratorApp\Entities;

class Validator
{
    public static function validateName(string $name)
    {
        if(!preg_match('/(?<=^)[a-zA-Z]+(?=$)/', $name)){
            throw new \Exception("Name can only consist of latin letters!");
        }
        return $name;
    }

    public static function validateEmail(string $email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \Exception("Enter valid email!");
        }
        return $email;
    }

    public static function validatePhone(string $phone)
    {
        if(!preg_match('/(?<=^)[+]?[\d]+([-\/][\d]+)*(?=$)/', $phone)){
            throw new \Exception("Enter valid phone number format!");
        }
        return $phone;
    }

    public static function validateGender(string $gender)
    {
        if(!in_array($gender, GENDER_OPTIONS)){
            throw new \Exception("Gender you entered is not valid!");
        }

        return $gender;
    }

    public static function validateDate(string $date)
    {
        $infoFromDate = explode('-', $date);
        if(count($infoFromDate)!=3){
            throw new \Exception("The date you entered is not valid!");
        }

        if(!checkdate($infoFromDate[2], $infoFromDate[1], $infoFromDate[0])){
            throw new \Exception("The date you entered is not valid!");
        }

        return \DateTime::createFromFormat('Y-d-m', $date);
    }

    public static function validateNationality(string $nationality)
    {
        if(!in_array($nationality, NATIONALITY_OPTIONS)){
            throw new \Exception("Nationality you entered is not valid!");
        }
        return $nationality;
    }

    public static function validateLastJobPosition(string $name, string $startDate, string $endDate)
    {
        if(strlen($name)<=2){
            throw new \Exception("The name of your previous employer is not valid");
        }
        $startDate = self::validateDate($startDate);
        $endDate = self::validateDate($endDate);
        if($startDate>=$endDate){
            throw new \Exception("The start and end date of your last job position are not consistent!");
        }

        return true;

    }

    public static function validateProgrammingLang(string $name, string $fluency)
    {
        if(strlen($name)==0){
            throw new \Exception("The name of this computer language is not valid");
        }

        if(!in_array($fluency, COMPUTER_SKILLS_OPTIONS)){
            throw new \Exception("There is no such option for programming language fluency!");
        }
        return true;
    }

    public static function validateLanguage(string $name, string $comprehension, string $reading, string $writing)
    {
        if(strlen($name)==0){
            throw new \Exception("The name of this language is not valid");
        }

        if(!(in_array($comprehension, LANGUAGE_SKILLS_OPTIONS) && in_array($reading, LANGUAGE_SKILLS_OPTIONS) && in_array($writing, LANGUAGE_SKILLS_OPTIONS)))
        {
            throw new \Exception("There is no such option for language fluency!");
        }
        return true;
    }

    public static function validateDriversLicense(string $category)
    {
        if(!in_array($category, DRIVERS_LICENSE_OPTIONS)){
            throw new \Exception("There is no such driving license category!");
        }
        return true;
    }
}