<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 11:35 ч.
 */

namespace Core\Commands;


use Models\Game;

abstract class CommandAbstract
{
    /**
     * @var Game
     */
    protected $game;

    /**
     * CommandAbstract constructor.
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }


}