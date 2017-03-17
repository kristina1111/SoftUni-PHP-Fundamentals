<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.3.2017 г.
 * Time: 19:00 ч.
 */

namespace Models;


class Board
{
    private $sizeRows;
    private $sizeCols;

    /**
     * @var array
     */
    private $gameField;

    private $numInns;

    /**
     * BoardGame constructor.
     * @param string $infoForField
     * @internal param $gameField
     */
    public function __construct(string $infoForField)
    {
        $this->setGameField($infoForField);
        $this->setNumInns(substr_count($infoForField, 'I'));
    }

    /**
     * @return mixed
     */
    public function getSizeRows()
    {
        return $this->sizeRows;
    }

    /**
     * @param mixed $sizeRows
     */
    public function setSizeRows($sizeRows)
    {
        $this->sizeRows = $sizeRows;
    }

    /**
     * @return mixed
     */
    public function getSizeCols()
    {
        return $this->sizeCols;
    }

    /**
     * @param mixed $sizeCols
     */
    public function setSizeCols($sizeCols)
    {
        $this->sizeCols = $sizeCols;
    }



    /**
     * @return mixed
     */
    public function getGameField()
    {
        return $this->gameField;
    }

    /**
     * @param string $infoForField
     * @internal param mixed $field
     */
    private function setGameField(string $infoForField)
    {
        $sizeRows = 0;
        $sizeCols = 0;
        $infoFields = explode('|', $infoForField);
        $resultGameField = [];
        $row = 0;

        foreach ($infoFields as $field) {
            $sizeRows++;
            $fieldPlaces = explode(' ', trim($field));
            foreach ($fieldPlaces as $place){
                $sizeCols++;
                $resultGameField[$row][] = $place;
            }
            $row++;
        }

        $this->gameField = $resultGameField;

        $this->setSizeRows($sizeRows);
        $this->setSizeCols($sizeCols/$sizeRows);

//        echo "<pre>";
//        print_r($this->field);
//        exit;
    }

    /**
     * @return mixed
     */
    public function getNumInns()
    {
        return $this->numInns;
    }

    /**
     * @param mixed $numInns
     */
    public function setNumInns($numInns)
    {
        $this->numInns = $numInns;
    }

    public function getFieldPlace(int $x, int $y)
    {
        return $this->getGameField()[$x][$y];
    }

}