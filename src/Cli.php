<?php

namespace BrainGames\Cli;

use function cli\prompt;

function run()
{
    echo \cli\Colors::colorize('%mWelcome%n  to the %9Brain%n Games!', true);
    echo PHP_EOL . PHP_EOL;
    $name = prompt('May I have your name?');
    echo \cli\Colors::colorize('Hello, %9' . $name . '%n!', true) . PHP_EOL;
}