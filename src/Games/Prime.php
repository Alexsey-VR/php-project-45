<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\answerIsTrue;
use function BrainGames\Engine\makeQuestionGetAnswer;
use function BrainGames\Engine\greeting;
use function BRainGames\Engine\goodAnswer;
use function BrainGames\Engine\badAnswer;
use function BrainGames\Engine\congratulations;
use const BrainGames\Engine\MAX_GAME_ROUNDS;

function isPrimeNumber(int $number): bool
{
    if (($number > 0) && ($number < 4)) {
        return true;
    }
    return (((3 ** $number) % $number === 3) && ((2 ** ($number - 1)) % $number === 1)) ? true : false;
}

function runPrime(): void
{
    $name = greeting();
    print_r("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $question = rand(1, 20);
        $answer = makeQuestionGetAnswer((string)$question);
        $result = isPrimeNumber($question) ? "yes" : "no";
        if (answerIsTrue($result, $answer)) {
            goodAnswer();
        } else {
            badAnswer($result, $answer, $name);
            return;
        }
    }
    congratulations($name);
}
