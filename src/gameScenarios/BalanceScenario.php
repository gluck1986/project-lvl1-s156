<?php

namespace BrainGames\gameScenarios\BalanceScenario;

use function BrainGames\CliIOFunctions\bold;
use function BrainGames\Scenario\buildScenario;

const MIN_NUM = 20;
const MAX_NUM = 40;

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
        $question = bold($number);
        $expected = (string)balance($number);
        $tester = getTester($expected);

        return [$question, $expected, $tester];
    };
}

function getTester(int $expected): \Closure
{
    return function (int $val) use ($expected): bool {
        $userData = intToArray($val);
        $expectedData = intToArray($expected);

        return getTesterData($expectedData) === getTesterData($userData);
    };
}

function getTesterData(array $provider): array
{
    $maxIndex = findIndexMaxValue($provider);
    $minIndex = findIndexMinValue($provider);
    $max = $provider[$maxIndex];
    $min = $provider[$minIndex];
    $countOfMax = countOf($provider, $max);
    $countOfMin = countOf($provider, $min);

    return [$max, $min, $countOfMax, $countOfMin];
}

function countOf(array $data, $needle): int
{
    return count(
        array_filter(
            $data,
            function ($val) use ($needle) {
                return $val === $needle;
            }
        )
    );
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
