<?php

$startDate = DateTime::createFromFormat('Y m d', trim(fgets(STDIN)));
$endDate = DateTime::createFromFormat('Y m d', trim(fgets(STDIN)));

$dateModifier = new DateModifier();
$dateModifier->getDateDiffInDays($startDate, $endDate);
echo $dateModifier->getDays();


class DateModifier
{
    private $days;

    public function __construct(int $days = 0)
    {
        $this->days = $days;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @param int $days
     */
    public function setDays(int $days)
    {
        $this->days = $days;
    }

    public function getDateDiffInDays(DateTime $startDate, DateTime $endDate){
        $diff = date_diff($startDate, $endDate);
        $this->setDays($diff->days);
    }
}