<?php

namespace BrainGames\gameScenarios\CalcScenario;

use function BrainGames\Scenario\buildScenario;

const ID = 'calc';

const MIN_NUM = 0;
const MAX_NUM = 10;

const KEY_OPERATION = 'operation';
const KEY_OPERATION_NAME = 'name';

function getCalcScenario()
{
    return buildScenario(getHead(), getAction());
}

function getHead(): string
{
    return 'What is the result of the expression?';
}

function getAction(): \Closure
{

    return function (): array {
        $numberOne = rand(MIN_NUM, MAX_NUM);
        $numberTwo = rand(MIN_NUM, MAX_NUM);
        list($operationName, $operation) = getRandomOperation();
        $msgTemplate = <<<TEXT
Question: %%9%s%%n %%9%s%%n %%9%s%%n
TEXT;
        $question = sprintf($msgTemplate, $numberOne, $operationName, $numberTwo);
        $expected = (string)$operation($numberOne, $numberTwo);

        return [$question, $expected];
    };
}

function getOperations(): array
{
    return [
        [
            '+',
            function ($first, $second) {
                return $first + $second;
            }
        ],
        [
            '-',
            function ($first, $second) {
                return $first - $second;
            }
        ],
        [
            '*',
            function ($first, $second) {
                return $first * $second;
            }
        ]
    ];
}

function getRandomOperation(): array
{
    $operations = getOperations();
    $countOperations = count($operations);
    $randomIndex = rand(0, $countOperations - 1);

    return $operations[$randomIndex];
}