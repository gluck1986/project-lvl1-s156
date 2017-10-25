<?php

namespace BrainGames\gameScenarios\EvenScenario;

use function BrainGames\CliIOFunctions\bold;
use function BrainGames\Scenario\buildScenario;

const ID = 'even';

const YES = 'yes';
const NO = 'no';

const MIN_NUM = 1;
const MAX_NUM = 99;

function getScenario()
{
    return buildScenario(getHead(), getAction());
}

function getHead(): string
{
    return 'Answer %P"yes"%n if number %9even%n otherwise answer %P"no"%n.';
}

function getAction(): \Closure
{

    return function () {
        $number = rand(MIN_NUM, MAX_NUM);
        $question = bold($number);
        $expected = $number % 2 === 0 ? YES : NO;

        return [$question, $expected];
    };
}
