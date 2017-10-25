<?php

namespace BrainGames\Cli;

use function BrainGames\gameScenarios\EvenScenario\getScenario;
use function BrainGames\GamesCore\initGame;

const NAME_SPACE_SCENARIOS = 'BrainGames\\gameScenarios\\';
const NAME_SPACE_SCENARIO_POSTFIX = 'Scenario';
const SCENARIO_INDEX_FUNCTION = 'getScenario';

function run($game_name = null)
{

    $funcName = getFullNameFunctionScenario($game_name);
    if (function_exists($funcName)) {
        initGame($funcName());
    } else {
        initGame(getDefault());
    }
}

function getDefault()
{
    return getScenario();
}


function getFullNameFunctionScenario($name)
{
    return NAME_SPACE_SCENARIOS .
        upperFirstChar($name) .
        NAME_SPACE_SCENARIO_POSTFIX .
        '\\' .
        SCENARIO_INDEX_FUNCTION;
}

function upperFirstChar(string $string): string
{
    if (mb_strlen($string) > 1) {
        return mb_strtoupper(mb_substr($string, 0, 1)) .
            mb_substr($string, 1, mb_strlen($string) - 1);
    } else {
        return mb_strtoupper($string);
    }
}
