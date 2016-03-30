<?php

namespace Yams\Services\Combinaisons;
use Yams\Services\Combinaison;

abstract class AbstractCombinaison implements Combinaison {
    
    protected $jeu;
    
    public function setGame(array $jeu)
    {
        $this->jeu = $jeu;
    }
    
    public function getName() {
        return static::NAME;
    }
}
