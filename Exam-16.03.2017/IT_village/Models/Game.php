<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 10:55 ч.
 */

namespace Models;


class Game
{
    private $counterMoves;

    /**
     * @var Board
     */
    private $board;

    /**
     * @var Player
     */
    private $player;

    /**
     * Game constructor.
     * @param Board $board
     * @param $player
     * @param int $counterMoves
     */
    public function __construct(Board $board, $player, int $counterMoves)
    {
        $this->setBoard($board);
        $this->setPlayer($player);
        $this->setCounterMoves($counterMoves);
    }

    /**
     * @return Board
     */
    public function getBoard(): Board
    {
        return $this->board;
    }

    /**
     * @param Board $board
     */
    public function setBoard(Board $board)
    {
        $this->board = $board;
    }

    /**
     * @return Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param Player $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }

    /**
     * @return int
     */
    public function getCounterMoves(): int
    {
        return $this->counterMoves;
    }

    /**
     * @param int $counterMoves
     */
    public function setCounterMoves(int $counterMoves)
    {
        $this->counterMoves = $counterMoves;
    }

    /**
     * @param int $movesToSkip
     */
    public function changeCounterMoves(int $movesToSkip)
    {
        $this->setCounterMoves($this->getCounterMoves()-$movesToSkip);
    }

    public function decreaseCounterMoves()
    {
        $this->setCounterMoves($this->getCounterMoves()-1);
    }


    public function walkFields(int $steps)
    {
        $row = $this->getPlayer()->getX(); // 1
        $col = $this->getPlayer()->getY(); // 0

        $stepsPassed = $steps;
        while (true){
            if($row==0){
                while ($col<$this->getBoard()->getSizeCols()-1){
                    $col++;
                    $stepsPassed--;
                    if(!$stepsPassed){
                        break 2;
                    }
                }
            }

            if($col==$this->getBoard()->getSizeCols()-1) {
                while ($row<$this->getBoard()->getSizeRows()-1 ){
                    $row++;
                    $stepsPassed--;
                    if(!$stepsPassed){
                        break 2;
                    }
                }
            }

            if($row == $this->getBoard()->getSizeRows()-1){
                while ($col>0 ){
                    $col--;
                    $stepsPassed--;
                    if(!$stepsPassed){
                        break 2;
                    }
                }
            }

            if($col==0){
                while ($row>0 ){
                    $row--;
                    $stepsPassed--;
                    if(!$stepsPassed){
                        break 2;
                    }
                }
            }

        }

        /**
         * @var Player
         */
        $this->player->changeX($row);
        $this->player->changeY($col);
    }

}