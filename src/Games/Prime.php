<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\GAMES_COUNT;

function isPrimeNumber(int $number): bool
{
    if (($number > 0) && ($number < 4)) {
        return true;
    }
    if (($number % 3 === 0) || ($number % 2 === 0)) {
        return false;
    }
    return true;
}

function runPrime(): void
{
    $lastNumber = 0;
    $questionNumber = 0;
    $description = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $flowSteps = [];
    $flowSteps['questionData'] = [];
    $flowSteps['trueResult'] = [];
    for ($i = 0; $i < GAMES_COUNT; $i++) {
        do {
            $lastNumber = $questionNumber;
            $questionNumber = rand(1, 20);
        } while ($questionNumber === $lastNumber);
        $flowSteps['questionData'][] = $questionNumber;
        $flowSteps['trueResult'][] = isPrimeNumber($questionNumber) ? "yes" : "no";
    }

    runGame($description, $flowSteps);
}
