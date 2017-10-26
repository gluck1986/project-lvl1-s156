<?php

namespace BrainGames\gameScenarios\BalanceScenario;

use function BrainGames\Scenario\buildScenario;

const MIN_NUM = 10;
const MAX_NUM = 99;

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
    return 'Balance the given number.';
}

function getAction(): \Closure
{

    return function () {
        $number = rand(MIN_NUM, MAX_NUM);
        $question = $number;
        $expected = (string)balance($number);

        return [$question, $expected];
    };
}

function balance(int $number): int
{
    $data = intToArray($number);
    $maxIndex = findIndexMaxValue($data);
    $minIndex = findIndexMinValue($data);
    if ($data[$maxIndex] - $data[$minIndex] > 1) {
        $data[$maxIndex] -= 1;
        $data[$minIndex] += 1;
        $result = arrayToInt($data);

        return balance($result);
    }
    asort($data);

    return arrayToInt($data);
}

function intToArray(int $number): array
{
    return str_split((string)$number);
}

function arrayToInt(array $data): int
{
    return (int)implode('', $data);
}

function findIndexMaxValue(array $arr, $minIndex = 0, $current = 0): int
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

function findIndexMinValue(array $arr, $minIndex = 0, $current = 0): int
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
