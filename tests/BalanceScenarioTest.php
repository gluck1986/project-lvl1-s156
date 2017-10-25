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
            [5028, 4434],
            [5028, 4434],
            [9655, 7666],
            [3255, 4344],
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

    public function getCountOfData()
    {
        return [
            [[1, 3, 3, 4, 6, 7,], 7, 1],
            [[1, 3, 3, 4, 6, 7,], 3, 2],
            [[1, 3, 7, 7, 6, 7,], 7, 3],
            [[1, 3, 7, 7, 6, 7,], 8, 0],
            [[1, 1, 1, 1, 1, 1,], 1, 6],
            [[1, 1, 1, 1, 1, 1,], 2, 0],
            [[], 2, 0],
            [[], 0, 0],
        ];
    }

    /**
     * @dataProvider getCountOfData
     */
    public function testCountOf($arr, $needle, $expected)
    {
        $this->assertEquals(
            $expected,
            \BrainGames\gameScenarios\BalanceScenario\countOf($arr, $needle)
        );
    }

    public function getTesterData()
    {
        return [
            [2223332, 2223332, true],
            [2223332, 2232332, true],
            [2223332, 3232322, true],
            [2223332, 2232323, true],
            [2223332, 3332222, true],
            [2223332, 3333222, false],
            [2223332, 2333223, false],
        ];
    }

    /**
     * @dataProvider getTesterData
     */
    public function testTester($userData, $expectedData, $expected)
    {
        if ($expected) {
            $this->assertTrue(getTester($expectedData)($userData));
        } else {
            $this->assertFalse(getTester($expectedData)($userData));
        }
    }


}
