<?php

namespace BrainGames\tests;

use PHPUnit\Framework\TestCase;
use function BrainGames\gameScenarios\ProgressionScenario\getSequence;

class ProgressionScenarioTest extends TestCase
{

    public function getDataProgressionGenerator()
    {
        return [
            [0, 2, 5, [0, 2, 4, 6, 8]],
            [0, 0, 5, [0, 0, 0, 0, 0]],
            [5, 1, 1, [5]],
            [1, 10, 2, [1, 11]],
        ];
    }

    /** @dataProvider getDataProgressionGenerator */
    public function testProgressionGenerator($start, $step, $length, $expected)
    {
        $this->assertEquals($expected, getSequence($step, $length, [$start]));
    }
}
