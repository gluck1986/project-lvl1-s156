<?php

namespace BrainGames\tests;

use PHPUnit\Framework\TestCase;
use function BrainGames\Cli\getFullNameFunctionScenario;
use function BrainGames\Cli\upperFirstChar;

class CliTest extends TestCase
{
    public function testUpperFirstChar()
    {
        $this->assertEquals('A', upperFirstChar('a'));
        $this->assertEquals('A', upperFirstChar('A'));
        $this->assertEquals('Abc', upperFirstChar('abc'));
        $this->assertEquals('ABC', upperFirstChar('ABC'));
    }


    public function testGetFullNameFunctionScenario()
    {
        $expected = 'BrainGames\gameScenarios\GameScenario\getScenario';
        $this->assertEquals($expected, getFullNameFunctionScenario('game'));
    }
}
