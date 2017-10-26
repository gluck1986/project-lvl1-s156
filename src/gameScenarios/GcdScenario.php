<?php

namespace BrainGames\gameScenarios\GcdScenario;

use function BrainGames\Halpers\calcGCD;
use function BrainGames\Scenario\buildScenario;

const MIN_NUM = 1;
const MAX_NUM = 20;

function run()
{
    \BrainGames\Cli\run(getScenario());
}

function getScenario()
{
    return buildScenario(getHead(), getAction());
}

function getHead(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function getAction(): \Closure
{

    return function () {
        $number1 = rand(MIN_NUM, MAX_NUM);
        $number2 = rand(MIN_NUM, MAX_NUM);
        $question = $number1 . ' ' . $number2;
        $expected = (string)calcGCD($number1, $number2);

        return [$question, $expected];
    };
}
