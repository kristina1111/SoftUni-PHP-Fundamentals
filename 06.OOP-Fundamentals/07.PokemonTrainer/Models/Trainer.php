<?php


class Trainer
{
    private static $lastId;

    private $name;
    private $numBadges;
    private $pokemonCollection = [];
    private $id;

    public function __construct(string $name, Pokemon $pokemon, $numBadges = 0)
    {
        $this->name = $name;
        $this->numBadges = $numBadges;
        $this->pokemonCollection[] = $pokemon;
        $this->id = ++self::$lastId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getNumBadges(): int
    {
        return $this->numBadges;
    }

    /**
     * @return array
     */
    public function getPokemonCollection(): array
    {
        return $this->pokemonCollection;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int $numBadges
     */
    private function setNumBadges(int $numBadges)
    {
        $this->numBadges = $numBadges;
    }

    /**
     * @param array $pokemonCollection
     */
    public function setPokemonCollection(array $pokemonCollection)
    {
        $this->pokemonCollection = $pokemonCollection;
    }

    public function addPokemonToCollection(Pokemon $pokemon){
        $this->pokemonCollection[] = $pokemon;
    }

    public function hasPokemonWithElement($element) : bool {
        foreach ($this->getPokemonCollection() as $pokemon) {
            if($pokemon->hasElement($element)){
                return true;
            }
        }
        return false;
    }

    public function increaseBadges(){
        $this->numBadges+=1;
    }

    public function decreaseMyPokemonsHealth(){
        foreach ($this->getPokemonCollection() as $pokemon) {
            $pokemon->decreaseHealth();
        }
    }

    public function deleteMyPokemon(){
        foreach ($this->pokemonCollection as &$pokemon) {
            if(!$pokemon->isAlive()){
                $index = array_search($pokemon, $this->pokemonCollection);
                array_splice($this->pokemonCollection, $index, 1);
            }
        }
    }

}