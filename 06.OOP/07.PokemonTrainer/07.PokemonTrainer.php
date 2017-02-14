<?php

/*
 * You wanna be the very best pokemon trainer, like no one ever was, so you set out to catch pokemon.
 * Define a class Trainer and a class Pokemon.
 * Trainers have a name, number of badges and a collection of pokemon, Pokemon have a name, an element and health,
 * all values are mandatory. Every Trainer starts with 0 badges.
 * From the console you will receive an unknown number of lines until you receive the command “Tournament”,
 * each line will carry information about a pokemon and the trainer who caught it in the format
 * “<TrainerName> <PokemonName> <PokemonElement> <PokemonHealth>”
 * where TrainerName is the name of the Trainer who caught the pokemon,
 * names are unique there cannot be 2 trainers with the same name.
 * After receiving the command “Tournament” an unknown number of lines containing one of three elements
 * “Fire”, “Water”, “Electricity” will follow until the command “End” is received.
 * For every command you must check if a trainer has atleast 1 pokemon with the given element,
 * if he does he receives 1 badge, otherwise all his pokemon lose 10 health,
 * if a pokemon falls to 0 or less health he dies and must be deleted from the trainer’s collection.
 * After the command “End” is received you should print all trainers sorted by the amount of badges
 * they have in descending order (if two trainers have the same amount of badges
 * they should be sorted by order of appearance in the input)
 * in the format “<TrainerName> <Badges> <NumberOfPokemon>”.
 *
 * Sample input 1:
Pesho Charizard Fire 100
Gosho Squirtle Water 38
Pesho Pikachu Electricity 10
Tournament
Fire
Electricity
End

 * Sample input 2:
Stamat Blastoise Water 18
Nasko Pikachu Electricity 22
Jicata Kadabra Psychic 90
Tournament
Fire
Electricity
Fire
End
 */

spl_autoload_register(function($class) {
    $class = $class . '.php';
    require_once "Models/" . $class;
});

$tournament = new Tournament();
$tournament->start();
$tournament->playPokemon();
$tournament->setTrainers($tournament->sortTrainersByBadgesDecr());
echo $tournament;

