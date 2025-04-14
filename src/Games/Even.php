<?php

namespace BrainGames\Games;

function even()
{
    $name = greeting();

    print_r("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $randValue = rand(1, 100);
        $answer = makeQuestionGetAnswer($randValue);
        $isEven = ($randValue + 1) % 2;
        $correctAnswer = $isEven ? "yes" : "no";
        if (answerIsTrue($correctAnswer, $answer)) {
            goodAnswer();
        } else {
            badAnswer($correctAnswer, $answer, $name);
            return;
        }
    }
    congratulations($name);
}
