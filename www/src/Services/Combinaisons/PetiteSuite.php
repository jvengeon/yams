<?php

namespace Yams\Services\Combinaisons;

class PetiteSuite extends AbstractCombinaison {
    
    const 
        NAME = 'Petite suite',
        NB_POINT = 30;
    
    public function validate()
    {
        $gameWithoutDoublon = array_unique($this->jeu);
        sort($gameWithoutDoublon);
        $gameString = implode('', $gameWithoutDoublon);
        
        if(preg_match('~1234|2345|3456~', $gameString) )
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
