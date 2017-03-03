<?php
namespace CalculateInterestApp\Entities;

class Validator
{
    const CURRENCIES_IN_USE = array('usd', 'eur', 'bgn');
    const PERIODS_IN_USE = array('6', '12', '24', '60');

    public static function validateCurrency(string $currency) : string
    {
        if(!in_array($currency, self::CURRENCIES_IN_USE)){
            throw new \Exception("You cannot calculate interest in that currency!");
        }
        return $currency;
    }

    public static function validatePeriod(string $period) : float
    {
        if(!filter_var($period, FILTER_VALIDATE_INT) || !in_array($period, self::PERIODS_IN_USE)){
            throw new \Exception("You need to enter valid period!");
        }
        return floatval($period);
    }

    public static function validateAnyNumber(string $input) : float
    {
        if(!filter_var($input, FILTER_VALIDATE_INT)){
            throw new \Exception("You need to enter valid number!");
        }

        if(floatval($input)<0){
            throw new \Exception("You need to enter positive number!");
        }
        return floatval($input);
    }
}