<?php

namespace Yams\Services\Combinaisons;

class Suite extends AbstractCombinaison {
    
    const 
        NAME = 'suite',
        NB_POINT = 40;
    
    public function validate()
    {
        $nbByNumber = array_count_values($this->jeu);
        $values = array_keys($nbByNumber);
        $nbValues = count($nbByNumber);

        if($nbValues === 5 && (empty(array_diff([1,2,3,4,5], $values)) || empty(array_diff([2,3,4,5,6], $values))))
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
