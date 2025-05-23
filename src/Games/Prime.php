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

function makeStep(): array
{
    $questionNumber = rand(1, 20);
    return [
        'questionData' => (string)$questionNumber,
        'trueResult' => isPrimeNumber($questionNumber) ? "yes" : "no"
    ];
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
        $step = makeStep();
        $flowSteps['questionData'][] = $step['questionData'];
        $flowSteps['trueResult'][] = $step['trueResult'];
    }

    runGame($description, $flowSteps);
}
