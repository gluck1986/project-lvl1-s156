<?php

namespace BrainGames\Scenario;

const HEAD = 'head';
const ACTION = 'action';

function buildScenario(string $head, \Closure $action)
{
    return function ($signal) use ($head, $action) {
        if ($signal === HEAD) {
            return $head;
        } else if ($signal === ACTION) {
            return $action;
        }
        throw new \Exception('Invalid signal:\'' . $signal . '\'');
    };
}

function getHead(\Closure $scenario): string
{
    return $scenario(HEAD);
}

function getGame(\Closure $scenario): \Closure
{
    return $scenario(ACTION);
}