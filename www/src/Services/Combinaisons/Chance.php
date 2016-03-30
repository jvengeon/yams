<?php

namespace Yams\Services\Combinaisons;

class Chance extends AbstractCombinaison {
    
    const 
        NAME = 'chance';
    
    public function validate()
    {
        return true;
    }
    
    public function getPoints()
    {
        return array_sum($this->jeu);
    }
    
}
