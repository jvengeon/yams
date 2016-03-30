<?php

namespace Yams\Services;

class CombinaisonsValidsRetriever {
    private 
        $jeu,
        $combinaisons;
    
    public function __construct()
    {
        $this->combinaisons = new \SplObjectStorage();
    }
    
    public function setGame(array $jeu)
    {
        $this->jeu = $jeu;
    }
    
    public function add(Combinaison $combinaison)
    {
        $this->combinaisons->attach($combinaison);
        
        return $this;
    }
    
    public function getValidCombinaisons()
    {
        $validCombinaisons = [];

        foreach($this->combinaisons as $combinaison)
        {
            $combinaison->setGame($this->jeu);
            if($combinaison->validate() === true)
            {
                $validCombinaisons[] = $combinaison;
            }
        }
        
        return $validCombinaisons;
    }
}
