<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\answerIsTrue;
use function BrainGames\Engine\makeQuestionGetAnswer;
use function BrainGames\Engine\greeting;
use function BRainGames\Engine\goodAnswer;
use function BrainGames\Engine\badAnswer;
use function BrainGames\Engine\congratulations;
use const BrainGames\Engine\MAX_GAME_ROUNDS;

function runEven(): void
{
    $name = greeting();

    print_r("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    for ($i = 0; $i < MAX_GAME_ROUNDS; $i++) {
        $randValue = (string)rand(1, 100);
        $answer = makeQuestionGetAnswer($randValue);
        $isEven = ($randValue + 1) % 2;
        $correctAnswer = ($isEven !== 0) ? "yes" : "no";
        if (answerIsTrue($correctAnswer, $answer)) {
            goodAnswer();
        } else {
            badAnswer($correctAnswer, $answer, $name);
            return;
        }
    }
    congratulations($name);
}
