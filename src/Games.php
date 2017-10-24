<?php

namespace BrainGames\Games;


use cli\Colors;
use function BrainGames\Functions\getName;
use function BrainGames\Functions\hello;
use function BrainGames\Functions\notCorrect;
use function BrainGames\Functions\tryAgain;
use function BrainGames\Functions\welcome;
use function BrainGames\Functions\win;
use function cli\prompt;

const BRAIN_EVEN_ID = 1;

const YES = 'yes';
const NO = 'no';


function brainEven()
{
    $min_num = 1;
    $max_num = 99;
    $nTrys = 3;
    $try = 0;
    welcome();
    echo Colors::colorize(
        'Answer %P"yes"%n if number %9even%n otherwise answer %P"no"%n.',
        true
    );
    echo PHP_EOL;
    echo PHP_EOL;
    $name = getName();
    hello($name);
    echo PHP_EOL;
    while ($try < $nTrys) {
        $try++;
        $number = rand($min_num, $max_num);
        echo Colors::colorize('Question: %9' . $number . '%n', true) . PHP_EOL;
        $answer = prompt('Your answer');
        echo PHP_EOL;
        $trueAnswer = $number % 2 === 0 ? YES : NO;
        if ($answer !== $trueAnswer) {
            notCorrect($trueAnswer, $answer);
            tryAgain($name);

            return;
        }
    }
    win($name);
}
