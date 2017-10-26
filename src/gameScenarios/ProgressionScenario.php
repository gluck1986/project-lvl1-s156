<?php

namespace BrainGames\gameScenarios\ProgressionScenario;

use function BrainGames\Scenario\buildScenario;

const MIN_START_NUM = 0;
const MAX_START_NUM = 10;
const SEQUENCE_STEP_MIN = 1;
const SEQUENCE_STEP_MAX = 4;
const SEQUENCE_LENGTH = 7;

function getScenario()
{
    return buildScenario(getHead(), getAction());
}

function getHead(): string
{
    return 'What number is missing in this progression?';
}

function getAction(): \Closure
{

    return function () {
        $step = rand(SEQUENCE_STEP_MIN, SEQUENCE_STEP_MAX);
        $start = rand(MIN_START_NUM, MAX_START_NUM);
        $omissionIndex = rand(0, SEQUENCE_LENGTH - 1);
        $sequence = getSequence($step, SEQUENCE_LENGTH, [$start]);
        list($expected, $question) = seqToStrWithOmiss($sequence, $omissionIndex);

        return [$question, $expected];
    };
}

function getSequence(int $step, int $length, array $init = []): array
{
    if (count($init) >= $length) {
        return $init;
    }
    $last = array_pop($init);

    return getSequence($step, $length, array_merge($init, [$last], [$last + $step]));
}

function seqToStrWithOmiss(array $array, $omissionsIndex): array
{
    $number = $array[$omissionsIndex];
    $array[$omissionsIndex] = '..';

    return [$number, implode(' ', $array)];
}
