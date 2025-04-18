<?php

namespace BrainGames\Games;

function isPrimeNumber(int $number): bool
{
    if (($number === 1) || ($number === 2)) {
        return true;
    }
    return (((3 ** $number) % $number) === 3) ? true : false;
}

function prime(): void
{
    $name = greeting();
    print_r("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $question = rand(1, 30);
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
