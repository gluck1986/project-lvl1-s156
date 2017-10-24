<?php

namespace BrainGames\GamesCore;

use function BrainGames\CliIOFunctions\ask;
use function BrainGames\CliIOFunctions\askName;
use function BrainGames\CliIOFunctions\bold;
use function BrainGames\CliIOFunctions\say;
use function BrainGames\CliIOFunctions\sayCorrect;
use function BrainGames\CliIOFunctions\sayHello;
use function BrainGames\CliIOFunctions\sayNotCorrect;
use function BrainGames\CliIOFunctions\sayTryAgain;
use function BrainGames\CliIOFunctions\sayWelcome;
use function BrainGames\CliIOFunctions\sayWin;
use function BrainGames\Scenario\getGame;
use function BrainGames\Scenario\getHead;

const BRAIN_EVEN_ID = 1;
const MAX_TRY = 3;

const YES = 'yes';
const NO = 'no';


function initGame(\Closure $scenario): void
{
    sayWelcome();
    say(getHead($scenario), 2);
    $name = askName();
    sayHello($name);
    $result = runGame(getGame($scenario), MAX_TRY);
    if ($result) {
        sayWin($name);
    } else {
        sayTryAgain($name);
    }
}

function runGame(\Closure $game, int $try): bool
{
    if ($try < 1) {
        return true;
    }
    list($question, $expected) = $game();
    say('Question: ' . bold($question));
    $actual = (string)ask('Your answer');
    if ($actual !== $expected) {
        sayNotCorrect($actual, $expected);

        return false;
    } else {
        sayCorrect();

        return runGame($game, $try - 1);
    }
}
