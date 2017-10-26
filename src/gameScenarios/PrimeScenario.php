<?php

namespace BrainGames\gameScenarios\PrimeScenario;

use function BrainGames\Halpers\isPrime;
use function BrainGames\Scenario\buildScenario;

const MIN_NUM = 1;
const MAX_NUM = 14;

const YES = 'yes';
const NO = 'no';

function getScenario()
{
    return buildScenario(getHead(), getAction());
}

function getHead(): string
{
    return 'Is it a simple number?';
}

function getAction(): \Closure
{
    return function () {
        $number = rand(MIN_NUM, MAX_NUM);
        $question = $number;
        $expected = isPrime($number) ? YES : NO;

        return [$question, $expected];
    };
}

