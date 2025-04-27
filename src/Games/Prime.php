<?php

namespace BrainGames\Games;

use function BrainGames\Games\answerIsTrue;
use function BrainGames\Games\makeQuestionGetAnswer;
use function BrainGames\Games\greeting;
use function BRainGames\Games\goodAnswer;
use function BrainGames\Games\badAnswer;
use function BrainGames\Games\congratulations;

use const BrainGames\Games\MAX_GAME_ROUNDS;

function isPrimeNumber(int $number): bool
{
    if (($number > 0) && ($number < 4)) {
        return true;
    }
    return (((3 ** $number) % $number === 3) &&
            ((2 ** ($number - 1)) % $number === 1)) ? true : false;
}

function runPrime(): void
{
    $name = showGreeting();
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
