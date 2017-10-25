<?php

namespace BrainGames\tests;


use PHPUnit\Framework\TestCase;
use function BrainGames\gameScenarios\BalanceScenario\balance;
use function BrainGames\gameScenarios\BalanceScenario\findIndexMaxValue;
use function BrainGames\gameScenarios\BalanceScenario\findIndexMinValue;
use function BrainGames\gameScenarios\BalanceScenario\getHead;


class BalanceScenarioTest extends TestCase
{
    public function testHead()
    {
        $this->assertEquals(getHead(), 'Balance the given number.');
    }

    public function getMaxData()
    {
        return [
            [[1, 2, 3, 4, 5], 4],
            [[5, 4, 3, 2, 1], 0],
            [[2, 2, 2, 2, 2, 2], 0],
            [[4, 2, 0, 6, 1], 3],
        ];
    }

    /**
     * @dataProvider getMaxData
     */
    public function testMax(Array $src, int $expected)
    {
        $this->assertEquals($expected, findIndexMaxValue($src));
    }

    public function getMinData()
    {
        return [
            [[1, 2, 3, 4, 5], 0],
            [[5, 4, 3, 2, 1], 4],
            [[2, 2, 2, 2, 2, 2], 0],
            [[4, 2, 0, 6, 1], 2],
        ];
    }

    /**
     * @dataProvider getMinData
     */
    public function testMin(Array $src, int $expected)
    {
        $this->assertEquals($expected, findIndexMinValue($src));
    }


    public function getGcdData()
    {
        return [
            [5028, 5028],
            [5028, 4344],
            [9655, 1],
            [3255, 15],
            [1, 1, 1],
            [999, 999],
        ];
    }

    /**
     * @dataProvider getGcdData
     */
    public function testGcd($src, $expected)
    {
        $this->markTestSkipped();
        $this->assertEquals(balance($src), $expected);
    }


}
