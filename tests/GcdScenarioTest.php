<?php

namespace BrainGames\tests;

use function BrainGames\gameScenarios\GcdScenario\calcGCD;

class GcdScenarioTest extends \PHPUnit\Framework\TestCase
{

    public function getData()
    {
        return [
            [5028, 1628, 4],
            [9655, 2049, 1],
            [3255, 9495, 15],
            [1, 1, 1],
            [999, 999, 999],
        ];
    }

    /**
     * @dataProvider getData
     */
    public function testGcd($first, $second, $expected)
    {
        $this->assertEquals(calcGCD($first, $second), $expected);
    }
}
