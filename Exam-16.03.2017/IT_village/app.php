<?php

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

$input = [
    "board"=> "P I F S | P 0 0 F | N 0 0 V | I F F I",
    "beginning"=> "2 1",
    "moves"=> "5 11 9 8 6 8 4"
];

$player = new \Models\Player(intval(trim($input['beginning'][0]))-1, intval(trim($input['beginning'][strlen($input['beginning'])-1]))-1);
$field = new \Models\Board($input['board']);

//var_dump($player);
//exit;

//$field = new \Models\BoardGame($_GET['board']);
$moves = array_reverse(explode(' ', trim($input['moves'])));
$cnt = count($moves)-1;
$game = new \Models\Game($field, $player, $cnt);





while ($game->getCounterMoves()>=0){
    if($game->getBoard()->getNumInns()==$game->getPlayer()->getNumInnsOwned()){
        echo "<p>You won! You own the village now! You have {$game->getPlayer()->getMoney()} coins!<p>";
        exit;
    }
    $game->getPlayer()->earnMoneyFromInns();
    if(!$game->getPlayer()->hasMoney()){
        echo "<p>You lost! You ran out of money!<p>";
        exit;
    }
    /**
     * @var \Models\Player
     */
    $game->walkFields(intval($moves[$game->getCounterMoves()]));
    $cmd = "Core\\Commands\\"
        . $game->getBoard()->getFieldPlace($game->getPlayer()->getX(), $game->getPlayer()->getY())
        . "Command";
    /**
     * @var \Core\Commands\CommandInterface
     */
    $cmdInstance = new $cmd($game);
    $cmdInstance->execute();

    $game->decreaseCounterMoves();
}

echo "<p>You lost! No more moves! You have {$game->getPlayer()->getMoney()} coins!<p>";
