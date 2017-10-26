<?php

namespace BrainGames\tests;

use function BrainGames\Halpers\calcGCD;
use function BrainGames\Halpers\isPrime;

class HalpersTest extends \PHPUnit\Framework\TestCase
{

    public function getGcdData()
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
     * @dataProvider getGcdData
     */
    public function testGcd($first, $second, $expected)
    {
        $this->assertEquals(calcGCD($first, $second), $expected);
    }

    public function getIsPrimeData()
    {
        return [
            [2, true],
            [3, true],
            [7, true],
            [4, false],
            [5, true],
            [8, false],
            [11, true],
            [14, false],
        ];
    }

    /**
     * @dataProvider getIsPrimeData
     */
    public function testIsPrime($src, $expected)
    {
        if ($expected) {
            $this->assertTrue(isPrime($src), $src);
        } else {
            $this->assertFalse(isPrime($src), $src);
        }

    }
}
