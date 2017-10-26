<?php

namespace BrainGames\GamesCore;

use function BrainGames\CliIOFunctions\ask;
use function BrainGames\CliIOFunctions\askName;
use function BrainGames\CliIOFunctions\sayCorrect;
use function BrainGames\CliIOFunctions\sayHead;
use function BrainGames\CliIOFunctions\sayHello;
use function BrainGames\CliIOFunctions\sayNotCorrect;
use function BrainGames\CliIOFunctions\sayQuestion;
use function BrainGames\CliIOFunctions\sayTryAgain;
use function BrainGames\CliIOFunctions\sayWelcome;
use function BrainGames\CliIOFunctions\sayWin;
use function BrainGames\Scenario\getGame;
use function BrainGames\Scenario\getHead;

const MAX_TRY = 3;

function initGame(\Closure $scenario): void
{
    sayWelcome();
    sayHead(getHead($scenario));
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
    list($question, $expected, $tester) = $game();
    sayQuestion($question);
    $actual = (string)ask('Your answer');
    if ((!is_null($tester) && $tester($actual))
        || (is_null($tester) && (string)$actual === (string)$expected)
    ) {
        sayCorrect();

        return runGame($game, $try - 1);
    } else {
        sayNotCorrect($actual, $expected);

        return false;
    }
}
