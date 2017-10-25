<?php

namespace BrainGames\CliIOFunctions;

use cli\Colors;
use function cli\prompt;

function say($text, $brs = 1): void
{
    echo Colors::colorize($text, true);
    br($brs);
}

function ask($question, $default = '0'): string
{
    return prompt($question, $default);
}

/**
 * Ask user name
 *
 * @return string
 */
function askName(): string
{
    return ask('May I have your name?');
}

/**
 * Display welcome message
 *
 * @return void
 */
function sayWelcome(): void
{
    say('%mWelcome%n  to the %9Brain%n Games!');
}

function sayCorrect(): void
{
    say('Correct');
}

function sayHello($name): void
{
    say('Hello, ' . bold($name) . '!', 2);
}

function sayTryAgain($name): void
{
    say('Let\'s try again, ' . bold($name) . '!');
}

function sayWin($name): void
{
    say('Congratulations, ' . bold($name) . '!');
}

function sayNotCorrect($actual, $expected): void
{
    $template = <<<TEXT
'%%9%s%%n' is wrong answer ;(. Correct answer was '%%9%s%%n.'
TEXT;
    say(sprintf($template, $actual, $expected));
}

function bold(string $text): string
{
    return '%9' . $text . '%n';
}

function br($colOfLines = 1): void
{
    if ($colOfLines < 1) {
        return;
    }
    echo PHP_EOL;
    br($colOfLines - 1);
}
