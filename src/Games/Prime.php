<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function isPrimeNumber(int $number): bool
{
    if ($number === 1) {
        return false;
    }
    if (($number > 1) && ($number < 4)) {
        return true;
    }
    if (($number % 3 === 0) || ($number % 2 === 0)) {
        return false;
    }
    return true;
}

function runPrime(): void
{
    $description = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $collection = [rand(1, 20), rand(1, 20), rand(1, 20)];
    $flowSteps = array_map(function ($item) {
        return [
            'questionData' => (string)$item,
            'trueResult' => isPrimeNumber($item) ? "yes" : "no"
        ];
    }, $collection);

    runGame($description, $flowSteps);
}
