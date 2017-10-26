<?php

namespace BrainGames\Halpers;

const FERMA_MAX_TRY = 50;

function calcGCD(int $fval, int $sval): int
{
    list($lower, $highest) = ($fval > $sval ? [$sval, $fval] : [$fval, $sval]);
    if (($remainder = ($highest % $lower)) === 0) {
        return $lower;
    }

    return calcGCD($remainder, $lower);
}

function isPrime(float $number, int $try = 0): bool
{
    if ($try > FERMA_MAX_TRY) {
        return true;
    }
    if ($number === (float)2) {
        return true;
    }
    $a = mt_rand(1, $number - 1);
    if (calcGCD($a, $number) !== 1) {
        return false;
    }
    if (($a ** ($number - 1) % $number) !== 1) {
        return false;
    }

    return isPrime($number, $try + 1);
}
