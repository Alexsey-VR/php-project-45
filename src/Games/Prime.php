<?php

namespace BrainGames\Games;

use function BrainGames\Games\answerIsTrue;
use function BrainGames\Games\makeQuestionGetAnswer;
use function BrainGames\Games\greeting;
use function cli\line;

use const BrainGames\Games\MAX_GAME_ROUNDS;

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
    $name = showGreeting();
    $lastNumber = 0;
    $questionNumber = 0;
    print_r("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        do {
            $lastNumber = $questionNumber;
            $questionNumber = rand(1, 20);
        } while ($questionNumber === $lastNumber);
        $answer = makeQuestionGetAnswer((string)$questionNumber);
        $result = isPrimeNumber($questionNumber) ? "yes" : "no";
        if (answerIsTrue($result, $answer)) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
