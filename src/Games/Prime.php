<?php

namespace BrainGames\Games;

function isPrimeNumber($number)
{
    if (($number === 3) || ($number === 1)) {
        return true;
    }
    return ((3 ** ($number - 1)) % $number) === 1 ? true : false;
}

function prime()
{
    $name = greeting();
    print_r("Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $question = rand(1, 30);
        $answer = makeQuestionGetAnswer($question);
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
