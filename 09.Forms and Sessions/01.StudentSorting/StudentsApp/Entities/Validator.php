<?php
namespace StudentsApp\Entities;

class Validator
{
    const NAME_MIN_LENGTH = 2;
    const NAME_MAX_LENGTH = 30;

    const SCORE_MIN_RANGE = 0;
    const SCORE_MAX_RANGE = 400;

    /**
     * @param $name
     * @return string
     * @throws \Exception
     */
    public static function validateName($name) : string
    {
        if(strlen($name)<self::NAME_MIN_LENGTH || strlen($name)>self::NAME_MAX_LENGTH){
            throw new \Exception("Name must be between " . self::NAME_MIN_LENGTH . " and " . self::NAME_MAX_LENGTH . " chars!");
        }
        $regex = '/(?<=^)[a-zA-Z]{' . self::NAME_MIN_LENGTH . ',' . self::NAME_MAX_LENGTH . '}(?=$)/';
//        $regex = '/(?<=^)[a-zA-Z](?=$)/';
        if(!preg_match($regex, $name)){
            throw new \Exception("Name must only contain latin letters!");
        }

        return $name;
    }

    public static function validateEmail($email) : string
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \Exception("Email is not valid!");
        }
        return $email;
    }

    /**
     * @param $score
     * @return int
     * @throws \Exception
     */
    public static function validateScore($score) : int
    {
        if(!(filter_var($score, FILTER_VALIDATE_INT,
            array(
                'min-range' => self::SCORE_MIN_RANGE,
                'max-range' => self::SCORE_MAX_RANGE
            ))))
        {
            throw new \Exception("Score must be number between " . self::SCORE_MIN_RANGE . " and " . self::SCORE_MAX_RANGE . "!");
        }

        return intval($score);
    }
}