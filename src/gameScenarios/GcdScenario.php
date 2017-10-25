<?php

namespace BrainGames\gameScenarios\GcdScenario;

use function BrainGames\CliIOFunctions\bold;
use function BrainGames\Scenario\buildScenario;

const ID = 'gcd';

const MIN_NUM = 1;
const MAX_NUM = 20;

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
        $question = bold($number1) . ' ' . bold($number2);
        $expected = (string)calcGCD($number1, $number2);

        return [$question, $expected];
    };
}

function calcGCD($fval, $sval): int
{
    list($lower, $highest) = ($fval > $sval ? [$sval, $fval] : [$fval, $sval]);
    if (($remainder = ($highest % $lower)) === 0) {
        return $lower;
    }

    return calcGCD($remainder, $lower);
}
