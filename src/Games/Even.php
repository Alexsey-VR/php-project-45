<?php

namespace BrainGames\Games;

function Even()
{
    $name = Greeting();

    print_r("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {

        $randValue = rand(1, 100);
        $answer = MakeQuestionGetAnswer($randValue);
        $isEven = ($randValue + 1) % 2;
        $correctAnswer = $isEven ? "yes" : "no";
        if (AnswerIsTrue($correctAnswer, $answer)) {
            GoodAnswer();
        } else {
            BadAnswer($correctAnswer, $answer, $name);
            return;
        }
    }
    Congratulations($name);
}
