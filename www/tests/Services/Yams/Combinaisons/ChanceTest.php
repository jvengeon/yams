<?php

namespace Yams\Tests\Services\Combinaisons;

use Yams\Services\Combinaisons\Chance;

class ChanceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataproviderValidate
     */
    public function testValidate($jeu)
    {
        $combinaison = new Chance();
        $combinaison->setGame($jeu);
        $result = $combinaison->validate();
        $this->assertTrue($result);
    }

    /**
     * 
     * @dataProvider dataproviderValidate
     */
    public function testGetPoints($jeu, $expected)
    {
        $combinaison = new Chance();
        $combinaison->setGame($jeu);
        $result = $combinaison->getPoints();
        
        $this->assertEquals($expected, $result);
    }
    
    public function dataproviderValidate()
    {
        return [
            'brelan' => [
                [1,2,1,3,1],
                8,
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
                15
            ],
            '4_differents_values' => [
                [1, 2, 3, 6, 1],
                13
            ],
            'suite' => [
                [1, 2, 3, 4, 5],
                15
            ],
            'double_paire' => [
                [2, 2, 1, 1, 6],
                12
            ],
        ];
    } 
}
