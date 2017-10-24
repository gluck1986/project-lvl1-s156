<?php

namespace BrainGames\Cli;

use const BrainGames\gameScenarios\CalcScenario\ID as CALC_ID;
use const BrainGames\gameScenarios\EvenScenario\ID as EVEN_ID;
use const BrainGames\gameScenarios\GcdScenario\ID as GCD_ID;
use function BrainGames\gameScenarios\CalcScenario\getCalcScenario;
use function BrainGames\gameScenarios\EvenScenario\getEvenScenario;
use function BrainGames\gameScenarios\GcdScenario\getGcdScenario;
use function BrainGames\GamesCore\initGame;

function run($game_id = null)
{
    if ($game_id === EVEN_ID) {
        initGame(getEvenScenario());
    } elseif ($game_id === CALC_ID) {
        initGame(getCalcScenario());
    } elseif ($game_id === GCD_ID) {
        initGame(getGcdScenario());
    } else {
        initGame(getDefault());
    }
}

function getDefault()
{
    return getEvenScenario();
}
