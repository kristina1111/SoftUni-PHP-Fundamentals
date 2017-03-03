<?php
namespace CalculateInterestApp\Entities;

class Deposit
{
    const COMPOUNDINGS_PER_YEAR = 12;
    private $amount;
    private $currency;
    private $compoundInterest;
    private $period;

    /**
     * Deposit constructor.
     * @param $amount
     * @param $currency
     * @param $compoundInterest
     * @param $period
     */
    public function __construct($amount, $currency, $compoundInterest, $period)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
        $this->setCompoundInterest($compoundInterest);
        $this->setPeriod($period);
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    private function setAmount($amount)
    {
        $this->amount = Validator::validateAnyNumber($amount);
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    private function setCurrency($currency)
    {
        $this->currency = Validator::validateCurrency($currency);
    }

    /**
     * @return mixed
     */
    public function getCompoundInterest()
    {
        return $this->compoundInterest;
    }

    /**
     * @param mixed $compoundInterest
     */
    public function setCompoundInterest($compoundInterest)
    {
        $this->compoundInterest = Validator::validateAnyNumber($compoundInterest);
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    private function setPeriod($period)
    {
        $this->period = Validator::validatePeriod($period);
    }

    private function calculateInterest() : float
    {
        return $this->amount * (pow((1 + ($this->getCompoundInterest()/100)/self::COMPOUNDINGS_PER_YEAR),
            (self::COMPOUNDINGS_PER_YEAR * $this->getPeriod()/12)) - 1);
    }

    public function amountAfterInterestAccumulation(){
        $this->amount = $this->getAmount() + $this->calculateInterest();
        return $this->amount;
    }

}