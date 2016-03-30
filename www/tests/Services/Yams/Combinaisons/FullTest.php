<?php

namespace Yams\Tests\Services\Combinaisons;

use Yams\Services\Combinaisons\Full;

class FullTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataproviderValidate
     */
    public function testValidate($jeu)
    {
        $combinaison = new Full();
        $combinaison->setGame($jeu);
        $result = $combinaison->validate();
        $this->assertTrue($result);
    }
    
    /**
     * @dataProvider dataproviderValidateFalse
     */
    public function testValidateFalse($jeu)
    {
        $combinaison = new Full();
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
        $combinaison = new Full();
        $combinaison->setGame($jeu);
        $result = $combinaison->getPoints();
        
        $this->assertEquals($expected, $result);
    }
    
    public function dataproviderValidate()
    {
        return [
            'full' => [
                [1, 3, 1, 1, 3],
                Full::NB_POINT,
            ],
            'full_2' => [
                [1, 2, 2, 2, 1],
                Full::NB_POINT,
            ],
            'yams' => [
                [2, 2, 2, 2, 2],
                Full::NB_POINT,
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
            'carre' => [
                [2, 2, 2, 2, 6],
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
