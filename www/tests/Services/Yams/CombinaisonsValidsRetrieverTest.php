<?php

namespace Yams\Tests\Services;

use Yams\Services\Combinaisons\Brelan;
use Yams\Services\Combinaisons\Carre;
use Yams\Services\Combinaisons\Yams;
use Yams\Services\Combinaisons\Full;
use Yams\Services\Combinaisons\Chance;
use Yams\Services\Combinaisons\PetiteSuite;
use Yams\Services\Combinaisons\Suite;

use Yams\Services\CombinaisonsValidsRetriever;

class CombinaisonsValidsRetrieverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataproviderValidate
     */
    public function testValidate($jeu)
    {
        $retriever = new CombinaisonsValidsRetriever($jeu);
        $retriever
            ->add(new Brelan())
            ->add(new Carre())
            ->add(new Yams())
            ->add(new Full())
            ->add(new Chance())
            ->add(new PetiteSuite())
            ->add(new Suite())
        ;
        
        $results = $retriever->getValidCombinaisons();
        $this->assertTrue($result);
    }

    public function dataproviderValidate()
    {
        return [
            'brelan' => [
                [1,2,1,3,1],
                []
            ],
            'brelan_2' => [
                [6,2,6,3,6],
                23,
            ],
            'full' => [
                [5,5,5,3,3],
                21,
            ],
            'carre' => [
                [4,4,4,4,5],
                21,
            ],
            'yams' => [
                [4,4,4,4,4],
                20,
            ],
            '5_differents_values' => [
                [1, 2, 3, 4, 5],
            ],
            '4_differents_values' => [
                [1, 2, 3, 6, 1],
            ],
            'suite' => [
                [1, 2, 3, 4, 5],
            ],
            'double_paire' => [
                [2, 2, 1, 1, 6],
            ],
        ];
    }
    
}
