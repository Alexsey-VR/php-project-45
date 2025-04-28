<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\MAX_GAME_ROUNDS;

function isPrimeNumber(int $number): bool
{
    if (($number > 0) && ($number < 4)) {
        return true;
    }
    if (($number % 3 === 0) || ($number % 2 === 0)) {
        return false;
    }
    return (((3 ** $number) % $number === 3) ||
            ((2 ** ($number - 1)) % $number === 1)) ? true : false;
}

function runPrime(): void
{
    $lastNumber = 0;
    $questionNumber = 0;
    $flow = [];
    $flow['description'] = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $flow['questionData'] = [];
    $flow['trueResult'] = [];
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        do {
            $lastNumber = $questionNumber;
            $questionNumber = rand(1, 20);
        } while ($questionNumber === $lastNumber);
        $flow['questionData'][] = $questionNumber;
        $flow['trueResult'][] = isPrimeNumber($questionNumber) ? "yes" : "no";
    }

    runEngine($flow);
}
