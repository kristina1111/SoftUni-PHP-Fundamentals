<?php


class Tournament
{
    private $trainers = [];

    /**
     * @return array
     */
    public function getTrainers(): array
    {
        return $this->trainers;
    }

    /**
     * @param array $trainers
     */
    public function setTrainers(array $trainers)
    {
        $this->trainers = $trainers;
    }



    public function start(){
        $input = trim(fgets(STDIN));

        while (strtolower($input)!="tournament"){
            $input = array_map('trim', explode(' ', $input));
            $newPokemon = new Pokemon($input[1], $input[2], intval($input[3]));
            if(array_key_exists($input[0], $this->trainers)){
                $this->trainers[$input[0]]->addPokemonToCollection($newPokemon);
            }else{
                $newTrainer = new Trainer($input[0],$newPokemon);
                $this->trainers[$input[0]] = $newTrainer;
            }

            $input = trim(fgets(STDIN));
        }
    }

    public function playPokemon(){
        $input = trim(fgets(STDIN));
        while (strtolower($input)!="end"){
            foreach ($this->trainers as &$trainer) {
                $hasElement = $trainer->hasPokemonWithElement($input);
                if($hasElement){
                    $trainer->increaseBadges();
                }else{
                    $trainer->decreaseMyPokemonsHealth();
                }

                $trainer->deleteMyPokemon();
            }

            $input = trim(fgets(STDIN));
        }
    }

    public function sortTrainersByBadgesDecr(){
        $sortableArr = [];
        $returnArr = [];
        foreach ($this->getTrainers() as $key=>$trainer){
            $sortableArr[$key] = $trainer->getNumBadges();
        }

        arsort($sortableArr);
        foreach ($sortableArr as $key=>$value){
            $returnArr[$key] = $this->getTrainers()[$key];
        }

        return $returnArr;
    }

    public function __toString()
    {
        $output = "";
        foreach ($this->getTrainers() as $trainer){
            $output .= $trainer->getName()
                . " "
                . $trainer->getNumBadges()
                . " "
                . count($trainer->getPokemonCollection())
                . PHP_EOL;
        }

        return $output;
    }
}