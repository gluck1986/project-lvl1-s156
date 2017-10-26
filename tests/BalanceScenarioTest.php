<?php

namespace BrainGames\tests;


use PHPUnit\Framework\TestCase;
use function BrainGames\gameScenarios\BalanceScenario\balance;
use function BrainGames\gameScenarios\BalanceScenario\findIndexMaxValue;
use function BrainGames\gameScenarios\BalanceScenario\findIndexMinValue;
use function BrainGames\gameScenarios\BalanceScenario\getHead;
use function BrainGames\gameScenarios\BalanceScenario\getTester;


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


    public function getBalanceData()
    {
        return [
            [5028, 3444],
            [5028, 3444],
            [9655, 6667],
            [3255, 3444],
            [1, 1, 1],
            [999, 999],
        ];
    }

    /**
     * @dataProvider getBalanceData
     */
    public function testBalance($src, $expected)
    {
        //$this->markTestSkipped();
        $this->assertEquals($expected, balance($src));
    }

}
