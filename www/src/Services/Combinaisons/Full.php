<?php

namespace Yams\Services\Combinaisons;

class Full extends AbstractCombinaison {
    
    const 
        NAME = 'full',
        NB_POINT = 25;
    
    public function validate()
    {
        $nbByNumber = array_count_values($this->jeu);
        $values = array_values($nbByNumber);
        
        if((in_array('2', $values) && in_array('3', $values)) || in_array('5', $values))
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
