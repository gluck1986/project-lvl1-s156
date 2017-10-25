<?php

namespace BrainGames\gameScenarios\BalanceScenario;

use function BrainGames\CliIOFunctions\bold;
use function BrainGames\Scenario\buildScenario;

const ID = 'balance';

const MIN_NUM = 1;
const MAX_NUM = 9;

function getGcdScenario()
{
    return buildScenario(getHead(), getAction());
}

function getHead(): string
{
    return 'Balance the given number.';
}

function getAction(): \Closure
{

    return function () {
        $number = rand(MIN_NUM, MAX_NUM);
        $question = bold($number);
        $expected = (string)balance($number);

        return [$question, $expected];
    };
}


function balance(int $number): int
{
    $data = (array)$number;
    $result = (int)implode('', $data);

    return $result;
}


function findIndexMaxValue(Array $arr, $minIndex = 0, $current = 0): int
{
    if ($current >= count($arr)) {
        return $minIndex;
    }
    if ($arr[$current] > $arr[$minIndex]) {
        return findIndexMaxValue($arr, $current, $current + 1);
    } else {
        return findIndexMaxValue($arr, $minIndex, $current + 1);
    }
}

function findIndexMinValue(Array $arr, $minIndex = 0, $current = 0): int
{
    if ($current >= count($arr)) {
        return $minIndex;
    }
    if ($arr[$current] < $arr[$minIndex]) {
        return findIndexMinValue($arr, $current, $current + 1);
    } else {
        return findIndexMinValue($arr, $minIndex, $current + 1);
    }
}
