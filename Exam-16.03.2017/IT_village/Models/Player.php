<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.3.2017 г.
 * Time: 18:51 ч.
 */

namespace Models;


class Player
{
    const MONEY_PER_INN_OWNED = 20;
    const MONEY_OWNED_AT_START = 50;

    private $x;
    private $y;

    private $money;

    private $numInnsOwned;

    /**
     * Player constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->setMoney(self::MONEY_OWNED_AT_START);
        $this->numInnsOwned = 0;
    }


    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    public function changeX(int $x)
    {
        $this->x = $x;
    }

    public function changeY(int $y)
    {
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    private function setMoney(int $money){
        $this->money = $money;
    }

    /**
     * @param int $money
     */
    public function spendMoney(int $money)
    {
        $this->setMoney($this->getMoney()-$money);
    }

    /**
     * @return int
     */
    public function getNumInnsOwned(): int
    {
        return $this->numInnsOwned;
    }

    /**
     * @param int $numInnsOwned
     */
    public function setNumInnsOwned(int $numInnsOwned)
    {
        $this->numInnsOwned = $numInnsOwned;
    }

    public function buyInn()
    {
        $this->setNumInnsOwned($this->getNumInnsOwned()+1);
    }

    public function hasMoney() : bool
    {
        return $this->getMoney()>=0;
    }

    public function earnMoneyFromInns()
    {
        $this->setMoney($this->getMoney() + $this->getNumInnsOwned()*self::MONEY_PER_INN_OWNED);
    }

    public function earnMoney(float $money, int $multiplier)
    {
        $this->setMoney(($this->getMoney() + $money)*$multiplier);
    }


}