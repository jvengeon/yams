<?php

namespace Yams\Tests\Services\Combinaisons;

use Yams\Services\Combinaisons\Suite;

class SuiteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataproviderValidate
     */
    public function testValidate($jeu)
    {
        $combinaison = new Suite();
        $combinaison->setGame($jeu);
        $result = $combinaison->validate();
        $this->assertTrue($result);
    }
    
    /**
     * @dataProvider dataproviderValidateFalse
     */
    public function testValidateFalse($jeu)
    {
        $combinaison = new Suite();
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
        $combinaison = new Suite();
        $combinaison->setGame($jeu);
        $result = $combinaison->getPoints();
        
        $this->assertEquals($expected, $result);
    }
    
    public function dataproviderValidate()
    {
        return [
            'suite' => [
                [1, 2, 3, 4, 5],
                Suite::NB_POINT,
            ],
            'suite_desordre' => [
                [6, 4, 5, 2, 3],
                Suite::NB_POINT,
            ],
            'suite_2' => [
                [2, 3, 4, 5, 6],
                Suite::NB_POINT,
            ],
        ];
    }
    
    public function dataproviderValidateFalse()
    {
        return [
            '5_differents_values' => [
                [1, 2, 3, 4, 6],
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
            'yams' => [
                [1, 1, 1, 1, 1],
            ],
            'double_paire' => [
                [2, 2, 1, 1, 6],
            ],
            'full' => [
                [2, 2, 1, 1, 2],
            ],
        ];
    }
}
