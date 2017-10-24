<?php

namespace BrainGames\Cli;

use const BrainGames\Games\BRAIN_EVEN_ID;
use function BrainGames\Games\brainEven;

function run($game_id = null)
{
    if ($game_id === BRAIN_EVEN_ID) {
        brainEven();
    } else {
        getDefault()();
    }
}

function getDefault()
{
    return 'BrainGames\Games\brainEven';
}
