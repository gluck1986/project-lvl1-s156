<?php

namespace BrainGames\Functions;

use cli\Colors;
use function cli\prompt;

/**
 * Display welcome message
 *
 * @return void
 */
function welcome()
{
    echo Colors::colorize('%mWelcome%n  to the %9Brain%n Games!', true);
    echo PHP_EOL;
}

function hello($name)
{
    echo Colors::colorize('Hello, %9' . $name . '%n!', true);
    echo PHP_EOL;
}

/**
 * Answer user name
 *
 * @return string
 */
function getName()
{
    $name = prompt('May I have your name?');

    return $name;
}


function tryAgain($name)
{
    echo Colors::colorize('Let\'s try again, %9' . $name . '%n!', true);
    echo PHP_EOL;
}

function win($name)
{
    echo Colors::colorize('Congratulations, %9' . $name . '%n!', true);
}

function notCorrect($actual, $expected)
{
    $template = <<<TEXT
'%%9%s%%n' is wrong answer ;(. Correct answer was '%%9%s%%n.'
TEXT;
    echo Colors::colorize(sprintf($template, $expected, $actual), true);
    echo PHP_EOL;
}
