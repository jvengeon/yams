<?php

namespace Yams\Tests\Services\Combinaisons;

use Yams\Services\Combinaisons\Carre;

class CarreTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataproviderValidate
     */
    public function testValidate($jeu)
    {
        $combinaison = new Carre();
        $combinaison->setGame($jeu);
        $result = $combinaison->validate();
        $this->assertTrue($result);
    }
    
    /**
     * @dataProvider dataproviderValidateFalse
     */
    public function testValidateFalse($jeu)
    {
        $combinaison = new Carre();
        $combinaison->setGame($jeu);
        $result = $combinaison->validate();
        $this->assertFalse($result);
    }
    
    /**
     * 
     * @dataProvider dataproviderValidate
     */
    public function testGetPoints($jeu, $expected)
    {
        $combinaison = new Carre();
        $combinaison->setGame($jeu);
        $result = $combinaison->getPoints();
        
        $this->assertEquals($expected, $result);
    }
    
    public function dataproviderValidate()
    {
        return [
            'carre' => [
                [1, 1, 1, 1, 3],
                7
            ],
            'carre_2' => [
                [1, 2, 2, 2, 2],
                9
            ],
            'yams' => [
                [2, 2, 2, 2, 2],
                10
            ],
        ];
    }
    
    public function dataproviderValidateFalse()
    {
        return [
            '5_differents_values' => [
                [1, 2, 3, 4, 5],
            ],
            '4_differents_values' => [
                [1, 2, 3, 6, 1],
            ],
            'brelan' => [
                [2, 2, 2, 1, 6],
            ],
            'full' => [
                [2, 2, 2, 6, 6],
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
