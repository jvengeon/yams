<?php

namespace Yams\Services\Combinaisons;

class Brelan extends AbstractCombinaison {
    
    const 
        NAME = 'brelan';
    
    public function validate()
    {
        $nbByNumber = array_count_values($this->jeu);
        $values = array_values($nbByNumber);
        
        if( in_array('3', $values) ||in_array('4', $values) || in_array('5', $values))
        {
            return true;
        }
        return false;
    }
    
    public function getPoints()
    {
        return array_sum($this->jeu);
    }
    
}
