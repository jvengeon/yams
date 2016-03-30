<?php

namespace Yams\Services\Combinaisons;

class Yams extends AbstractCombinaison {
    
    const 
        NB_POINT = 50,
        NAME = 'yams';
    
    public function validate()
    {
        $nbByNumber = array_count_values($this->jeu);
        $values = array_values($nbByNumber);
        
        if(in_array('5', $values))
        {
            return true;
        }
        return false;
    }
    
    public function getPoints()
    {
        return self::NB_POINT;
    }
    
}
